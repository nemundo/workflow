<?php


namespace Nemundo\Workflow\Inbox;


use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\Workflow\Data\Workflow\WorkflowCount;
use Nemundo\Workflow\Data\Workflow\WorkflowPaginationReader;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Process\AbstractProcess;
use Nemundo\Db\Filter\Filter;
use Nemundo\Model\Join\ModelJoin;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentModel;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignmentModel;
use Nemundo\Db\Sql\Order\SortOrder;


trait WorkflowInboxTrait
{

    /**
     * @var WorkflowStatus
     */
    public $status = WorkflowStatus::SHOW_ALL;

    public $sorting = WorkflowSorting::BY_ITEM_ORDER_DESC;

    /**
     * @var AbstractProcess[]
     */
    private $processFilterList = [];

    private $processIdList = [];

    /**
     * @var AbstractUsergroup[]
     */
    private $usergroupFilterList = [];

    private $usergroupIdFilterList = [];

    private $userIdFilterList = [];

    private $userCreatorIdFilterList = [];

    /**
     * @var WorkflowCount
     */
    private $workflowCount;


    public function addUsergroupFilter(AbstractUsergroup $usergroup)
    {
        $this->usergroupFilterList[] = $usergroup;
        return $this;
    }

    public function addUsergroupIdFilter($usergroupId)
    {
        $this->usergroupIdFilterList[] = $usergroupId;
        return $this;
    }

    public function addUserIdFilter($userId)
    {
        $this->userIdFilterList[] = $userId;
        return $this;
    }

    public function addUserCreatorIdFilter($userId)
    {
        $this->userCreatorIdFilterList[] = $userId;
        return $this;
    }


    public function addProcessFilter(AbstractProcess $process)
    {
        $this->processFilterList[] = $process;
        return $this;
    }


    public function addProcessIdFilter($processId)
    {
        $this->processIdList[] = $processId;
        return $this;
    }


    /**
     * @param WorkflowReader|WorkflowPaginationReader $workflowReader
     */
    protected function loadReader($workflowReader)
    {

        $workflowReader->model->loadWorkflowStatus();
        $workflowReader->model->loadProcess();

        $this->workflowCount = new WorkflowCount();

        // Process Filter
        foreach ($this->processFilterList as $process) {
            $workflowReader->filter->andEqual($workflowReader->model->processId, $process->processId);
            $this->workflowCount->filter->andEqual($workflowReader->model->processId, $process->processId);
        }

        foreach ($this->processIdList as $processId) {
            $workflowReader->filter->andEqual($workflowReader->model->processId, $processId);
            $this->workflowCount->filter->andEqual($workflowReader->model->processId, $processId);
        }


        $userUsergroupFilter = new Filter();
        $userUsergroupFilterMode = false;

        // User Filter
        if (sizeof($this->userIdFilterList) > 0) {

            $userUsergroupFilterMode = true;

            $userAssignmentModel = new UserAssignmentModel();

            $join = new ModelJoin();
            $join->type = $workflowReader->model->id;
            $join->externalModel = $userAssignmentModel;
            $join->externalType = $userAssignmentModel->workflowId;

            $workflowReader->addJoin($join);
            $this->workflowCount->addJoin($join);

            //$workflowReader->filter->andEqual($userAssignmentModel->delete, false);


            $filter = new Filter();
            foreach ($this->userIdFilterList as $userId) {
                $filter->orEqual($userAssignmentModel->userId, $userId);
            }
            $userUsergroupFilter->orFilter($filter);

        }


        // Usergroup Filter
        $usergroupIdList = $this->usergroupIdFilterList;

        foreach ($this->usergroupFilterList as $usergroup) {
            $usergroupIdList[] = $usergroup->usergroupId;
        }

        if (sizeof($usergroupIdList) > 0) {

            $userUsergroupFilterMode = true;

            $usergroupAssignmentModel = new UsergroupAssignmentModel();

            $join = new ModelJoin();
            $join->type = $workflowReader->model->id;
            $join->externalModel = $usergroupAssignmentModel;
            $join->externalType = $usergroupAssignmentModel->workflowId;


            $workflowReader->addJoin($join);
            $this->workflowCount->addJoin($join);

            $workflowReader->filter->andEqual($usergroupAssignmentModel->delete, false);

            $filter = new Filter();
            foreach ($usergroupIdList as $usergroupId) {
                $filter->orEqual($usergroupAssignmentModel->usergroupId, $usergroupId);
            }
            $userUsergroupFilter->orFilter($filter);

        }


        if ($userUsergroupFilterMode) {
            $workflowReader->filter->andFilter($userUsergroupFilter);
            $this->workflowCount->filter->andFilter($userUsergroupFilter);
        }


        // User Creator
        if (sizeof($this->userCreatorIdFilterList) > 0) {

            foreach ($this->userCreatorIdFilterList as $userId) {
                $workflowReader->filter->andEqual($workflowReader->model->userId, $userId);
            }

        }


        if ($this->status == WorkflowStatus::SHOW_OPEN) {
            $workflowReader->filter->andEqual($workflowReader->model->closed, false);
            $this->workflowCount->filter->andEqual($workflowReader->model->closed, false);
        }

        if ($this->status == WorkflowStatus::SHOW_CLOSED) {
            $workflowReader->filter->andEqual($workflowReader->model->closed, true);
            $this->workflowCount->filter->andEqual($workflowReader->model->closed, true);
        }





        // Sorting
        switch ($this->sorting) {

            case WorkflowSorting::BY_NUMBER_DESC:
                $workflowReader->addOrder($workflowReader->model->number, SortOrder::DESCENDING);
                break;

            case WorkflowSorting::BY_NUMBER:
                $workflowReader->addOrder($workflowReader->model->number);
                break;

            case WorkflowSorting::BY_ITEM_ORDER_DESC:
                $workflowReader->addOrder($workflowReader->model->itemOrder, SortOrder::DESCENDING);
                break;


        }

    }


    protected function getWorkflowCount()
    {

        $workflowCount = $this->workflowCount->getCount();
        return $workflowCount;

    }


}