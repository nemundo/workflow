<?php

namespace Nemundo\Workflow\Inbox;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Workflow\Data\Workflow\WorkflowRow;
use Nemundo\Db\Filter\Filter;
use Nemundo\Model\Join\ModelJoin;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentModel;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignmentModel;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;

class WorkflowInboxReader extends AbstractDataSource
{

    use WorkflowInboxTrait;


    protected function loadData()
    {


        $workflowReader = new WorkflowReader();

        $this->loadReader($workflowReader);

        $workflowReader->model->loadWorkflowStatus();
        $workflowReader->model->loadProcess();

        // Process Filter
        foreach ($this->processFilterList as $process) {
            $workflowReader->filter->andEqual($workflowReader->model->processId, $process->processId);
        }

        // User Filter
        if (sizeof($this->userIdFilterList) > 0) {

            $userAssignmentModel = new UserAssignmentModel();

            $join = new ModelJoin();
            $join->type = $workflowReader->model->id;
            $join->externalModel = $userAssignmentModel;
            $join->externalType = $userAssignmentModel->workflowId;

            $workflowReader->addJoin($join);
            //$workflowCount->addJoin($join);


            $filter = new Filter();
            foreach ($this->userIdFilterList as $userId) {
                $filter->andEqual($userAssignmentModel->userId, $userId);
            }
            $workflowReader->filter->orFilter($filter);

        }


        // Usergroup Filter
        if (sizeof($this->usergroupFilterList) > 0) {

            $usergroupAssignmentModel = new UsergroupAssignmentModel();

            $join = new ModelJoin();
            $join->type = $workflowReader->model->id;
            $join->externalModel = $usergroupAssignmentModel;
            $join->externalType = $usergroupAssignmentModel->workflowId;

            $workflowReader->addJoin($join);

            $filter = new Filter();
            foreach ($this->usergroupFilterList as $usergroup) {
                $filter->andEqual($usergroupAssignmentModel->usergroupId, $usergroup->usergroupId);
            }
            $workflowReader->filter->orFilter($filter);

        }



        if ($this->status == WorkflowStatus::SHOW_OPEN) {
            $workflowReader->filter->andEqual($workflowReader->model->closed, false);
        }

        if ($this->status == WorkflowStatus::SHOW_CLOSED) {
            $workflowReader->filter->andEqual($workflowReader->model->closed, true);
        }

        switch ($this->sorting) {

            case WorkflowSorting::BY_NUMBER_DESC:
                $workflowReader->addOrder($workflowReader->model->number, SortOrder::DESCENDING);
                break;

            case WorkflowSorting::BY_NUMBER:
                $workflowReader->addOrder($workflowReader->model->number);
                break;

        }

        foreach ($workflowReader->getData() as $workflowRow) {
            $this->addItem($workflowRow);
        }

    }


    /**
     * @return WorkflowRow[]
     */
    public function getData()
    {
        return parent::getData();
    }


}