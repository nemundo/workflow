<?php

namespace Nemundo\Workflow\Builder;


use Nemundo\Workflow\Data\Workflow\WorkflowUpdate;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChange;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class WorkflowStatusChangeBuilder
{

    /**
     * @var string
     */
    public $workflowId;

    /**
     * @var string
     */
    public $workflowItemId;

    /**
     * @var AbstractWorkflowStatus
     */
    public $workflowStatus;

    /**
     * @var bool
     */
    public $draft = false;


    public function changeStatus()
    {

        // Status Change
        $data = new WorkflowStatusChange();
        $data->workflowStatusId = $this->workflowStatus->workflowStatusId;
        $data->workflowId = $this->workflowId;
        $data->workflowItemId = $this->workflowItemId;
        $data->draft = $this->draft;
        $statusChangeId = $data->save();


        // Workflow
        $update = new WorkflowUpdate();

        if ($this->workflowStatus->changeWorkflowStatus) {
            $update->workflowStatusId = $this->workflowStatus->workflowStatusId;
        }

        if ($this->workflowStatus->closingWorkflow) {
            $update->closed = true;
        }

        $update->draft = $this->draft;

        $update->updateById($this->workflowId);

        $changeEvent = new StatusChangeEvent();
        $changeEvent->workflowId = $this->workflowId;
        $changeEvent->workflowItemId = $this->workflowItemId;
        $changeEvent->statusChangeId = $statusChangeId;

        $this->workflowStatus->onChange($changeEvent);


        return $statusChangeId;

    }

}