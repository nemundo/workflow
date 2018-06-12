<?php

namespace Nemundo\Workflow\Builder;


use Nemundo\Workflow\Action\AbstractWorkflowAction;
use Nemundo\Workflow\Action\UserAssignmentAction;
use Nemundo\Workflow\Data\UserAssignment\UserAssignment;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class WorkflowItem extends AbstractWorkflowAction
{

    /**
     * @var string
     */
    public $workflowNumber;

    /**
     * @var string
     */
    public $subject;


    /**
     * @var AbstractWorkflowStatus
     */
    public $workflowStatus;


    public function __construct($workflowId)
    {
        parent::__construct($workflowId);


        $reader = new WorkflowReader();
        $reader->model->loadWorkflowStatus();
        $workflowRow = $reader->getRowById($workflowId);

        $this->workflowNumber = $workflowRow->workflowNumber;
        $this->subject = $workflowRow->subject;

        $this->workflowStatus = $workflowRow->workflowStatus->getWorkflowStatusClassObject();

    }


    public function getProcess()
    {


        $reader = new WorkflowReader();
        $reader->model->loadProcess();
        $workflowRow = $reader->getRowById($this->workflowId);

        $process = $workflowRow->process->getProcessClassObject();

        return $process;


    }


    public function getTitle()
    {

        $title = $this->workflowNumber . ' ' . $this->subject;
        return $title;

    }


    public function assignUser($userId)
    {

        (new UserAssignmentAction($this->workflowId))
            ->assignUser($userId);

        /*
        $data = new UserAssignment();
        $data->ignoreIfExists = true;
        $data->workflowId = $this->workflowId;
        $data->userId = $userId;
        $data->save();*/

    }


    public function getUserAssign()
    {


    }


    /**
     * @return AbstractWorkflowStatus[]
     */
    public function getFollowingStatus()
    {

        $list = [];

        foreach ($this->workflowStatus->getFollowingStatusClassList() as $className) {

            /** @var AbstractWorkflowStatus $status */
            $status = new $className();

            $list[] = $status;

        }


        return $list;


    }


    /**
     * @return \Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeRow[]
     */
    public function getStatusChange()
    {

        $changeReader = new WorkflowStatusChangeReader();
        $changeReader->model->loadWorkflowStatus();
        $changeReader->model->loadUser();
        $changeReader->filter->andEqual($changeReader->model->workflowId, $this->workflowId);
        $changeReader->addOrder($changeReader->model->itemOrder);

        return $changeReader->getData();

    }


}