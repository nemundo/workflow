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


    public function changeStatus()
    {

        // Status Change
        $data = new WorkflowStatusChange();
        $data->workflowStatusId = $this->workflowStatus->workflowStatusId;  // $this->workflowStatusId;
        $data->workflowId = $this->workflowId;

        // nur bei data
        $data->workflowItemId = $this->workflowItemId;

        //$draft = $this->draftMode;
        //$data->draft = $draft;
        $statusChangeId = $data->save();


        // Workflow
        $update = new WorkflowUpdate();

        if ($this->workflowStatus->changeWorkflowStatus) {
            $update->workflowStatusId = $this->workflowStatus->workflowStatusId;
        }

        if ($this->workflowStatus->closingWorkflow) {
            $update->closed = true;
        }

        //$update->draft = $draft;

        $update->updateById($this->workflowId);
        //$this->statusChangeId = $statusChangeId;



        $this->workflowStatus->statusChangeId = $statusChangeId;
        $this->workflowStatus->onChange($this->workflowId, $this->workflowItemId);

        return $statusChangeId;

    }

}