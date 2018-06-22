<?php

namespace Nemundo\Workflow\Builder;


use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;
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

    /**
     * @var bool
     */
    public $checkFollowingStatus = true;


    public function changeStatus()
    {

        if (!$this->workflowStatus->checkUserVisibility()) {
            LogMessage::writeError('No access');
        }

        if ($this->checkFollowingStatus) {

            $workflowItem = (new WorkflowItem($this->workflowId));

            $valid = false;
            foreach ($workflowItem->workflowStatus->getFollowingStatusClassList() as $followingStausClass) {
                if ($followingStausClass !== $this->workflowStatus->getClassName()) {
                    $valid = true;
                }
            }

            if (!$valid) {
                LogMessage::writeError('Workflow and Status are not valid');
                exit;
            }

        }


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


        if (!$this->draft) {

            $changeEvent = new StatusChangeEvent();
            $changeEvent->workflowId = $this->workflowId;
            $changeEvent->workflowItemId = $this->workflowItemId;
            $changeEvent->statusChangeId = $statusChangeId;

            $this->workflowStatus->onChange($changeEvent);
        }

        return $statusChangeId;

    }

}