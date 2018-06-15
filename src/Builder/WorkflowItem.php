<?php

namespace Nemundo\Workflow\Builder;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\Action\UserAssignmentAction;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class WorkflowItem extends AbstractBase
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

    /**
     * @var string
     */
    private $workflowId;

    public function __construct($workflowId)
    {

        $this->workflowId = $workflowId;

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

    public function getDataId() {

        $row = (new WorkflowReader())->getRowById($this->workflowId);
        return $row->dataId;

    }


    public function assignUser($userId)
    {

        (new UserAssignmentAction($this->workflowId))
            ->assignUser($userId);

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