<?php


namespace Nemundo\Workflow\Inbox;


use Nemundo\Db\Reader\AbstractDataReader;
use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\Workflow\Data\Workflow\WorkflowPaginationReader;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Process\AbstractProcess;
use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Workflow\Data\Workflow\WorkflowRow;
use Nemundo\Db\Filter\Filter;
use Nemundo\Model\Join\ModelJoin;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentModel;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignmentModel;
use Nemundo\Db\Sql\Order\SortOrder;


trait WorkflowInboxTrait
{

    // Sorting

    /**
     * @var bool
     */
    // public $showOpenWorklow = true;

    /**
     * @var bool
     */
    //public $showClosedWorkflow = true;

    /**
     * @var WorkflowStatus
     */
    public $status = WorkflowStatus::SHOW_ALL;

    public $sorting = WorkflowSorting::BY_NUMBER_DESC;


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
        //$workflowReader->paginationLimit = 30;
        //$workflowReader->addOrder($workflowReader->model->itemOrder, SortOrder::DESCENDING);

        //$workflowCount = new WorkflowCount();

        // Process Filter
        foreach ($this->processFilterList as $process) {
            $workflowReader->filter->andEqual($workflowReader->model->processId, $process->processId);
            //$workflowCount->filter->andEqual($workflowReader->model->processId, $process->processId);
        }

        foreach ($this->processIdList as $processId) {
            $workflowReader->filter->andEqual($workflowReader->model->processId, $processId);
            //$workflowCount->filter->andEqual($workflowReader->model->processId, $process->processId);
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
            //$workflowCount->filter->orFilter($filter);

        }


        // Usergroup Filter
        $usergroupIdList = $this->usergroupIdFilterList;

        foreach ($this->usergroupFilterList as $usergroup) {
         $usergroupIdList[]=  $usergroup->usergroupId;
        }

        if (sizeof($usergroupIdList) > 0) {

            $usergroupAssignmentModel = new UsergroupAssignmentModel();

            $join = new ModelJoin();
            $join->type = $workflowReader->model->id;
            $join->externalModel = $usergroupAssignmentModel;
            $join->externalType = $usergroupAssignmentModel->workflowId;

            $workflowReader->addJoin($join);
            //$workflowCount->addJoin($join);

            $filter = new Filter();
            foreach ($usergroupIdList  as $usergroupId) {
                $filter->andEqual($usergroupAssignmentModel->usergroupId, $usergroupId);
            }
            $workflowReader->filter->orFilter($filter);
            //$workflowCount->filter->orFilter($filter);

        }








        if ($this->status == WorkflowStatus::SHOW_OPEN) {
            $workflowReader->filter->andEqual($workflowReader->model->closed, false);
        }

        if ($this->status == WorkflowStatus::SHOW_CLOSED) {
            $workflowReader->filter->andEqual($workflowReader->model->closed, true);
        }


        //


        //$workflowCount->filter->andEqual($workflowCount->model->closed, true);


        /*
        if ($processListBox->getValue() !== '') {
            $workflowReader->filter->andEqual($workflowReader->model->processId, $processListBox->getValue());
        }

        if (($statusListBox->getValue() == 1) || ($statusListBox->getValue() == '')) {
            $workflowReader->filter->andEqual($workflowReader->model->closed, false);
        }

        if ($statusListBox->getValue() == 2) {
            $workflowReader->filter->andEqual($workflowReader->model->closed, true);
        }*/


        switch ($this->sorting) {

            case WorkflowSorting::BY_NUMBER_DESC:
                $workflowReader->addOrder($workflowReader->model->number, SortOrder::DESCENDING);
                break;

            case WorkflowSorting::BY_NUMBER:
                $workflowReader->addOrder($workflowReader->model->number);
                break;

        }


    }


}