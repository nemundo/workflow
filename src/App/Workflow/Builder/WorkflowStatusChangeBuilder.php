<?php

namespace Nemundo\Workflow\App\Workflow\Builder;


use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowUpdate;
use Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange\WorkflowStatusChange;
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
            (new LogMessage())->writeError('No access');
        }


        $this->checkFollowingStatus = false;

        if ($this->checkFollowingStatus) {


            $workflowItem = (new WorkflowItem($this->workflowId));

            (new Debug())->write($workflowItem->workflowStatus);


            $valid = false;
            foreach ($workflowItem->workflowStatus->getFollowingStatusClassList() as $followingStausClass) {
                if ($followingStausClass !== $this->workflowStatus->getClassName()) {
                    $valid = true;
                }
            }


            if (!$valid) {
                (new LogMessage())->writeError('Workflow and Status are not valid. Refresh Browser.');
                exit;
            }

        }


        $changeEvent = new StatusChangeEvent();
        $changeEvent->workflowId = $this->workflowId;
        $changeEvent->workflowItemId = $this->workflowItemId;

        // Status Change
        $data = new WorkflowStatusChange();
        $data->workflowStatusId = $this->workflowStatus->id;
        $data->workflowId = $this->workflowId;
        $data->workflowItemId = $this->workflowItemId;
        $data->draft = $this->draft;
        $data->message = $this->workflowStatus->getStatusText($changeEvent);
        $statusChangeId = $data->save();

        $changeEvent->statusChangeId = $statusChangeId;


        // Workflow
        $update = new WorkflowUpdate();

        if ($this->workflowStatus->changeWorkflowStatus) {
            $update->workflowStatusId = $this->workflowStatus->id;
        }

        if ($this->workflowStatus->closingWorkflow) {
            $update->closed = true;
        }

        $update->draft = $this->draft;

        $update->updateById($this->workflowId);


        if (!$this->draft) {
            $this->workflowStatus->onChange($changeEvent);
            //$this->workflowStatus->onCreate($this->workflowItemId);

            $this->workflowStatus->onContainerCreate($this->workflowId, $this->workflowItemId);


        }

        return $statusChangeId;

    }

}