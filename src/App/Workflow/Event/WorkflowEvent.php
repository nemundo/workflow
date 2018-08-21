<?php

namespace Nemundo\Workflow\App\Workflow\Event;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Event\AbstractEvent;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDraftDataWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\WorkflowIdTrait;
use Nemundo\Workflow\App\Workflow\Content\Type\WorkflowStatusTrait;
use Nemundo\Workflow\App\Workflow\Data\StatusChange\StatusChange;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowUpdate;

class WorkflowEvent extends AbstractEvent
{

    /**
     * @var AbstractContentType|AbstractWorkflowStatus
     */
    public $workflowStatus;

    /**
     * @var string
     */
    public $workflowId;

    /**
     * @var bool
     */
    public $draft = false;


    public function run($id)
    {

        /*
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

                }*/


        $data = new StatusChange();
        $data->workflowStatusId = $this->workflowStatus->id;
        $data->workflowId = $this->workflowId;
        $data->dataId = $id;
        $data->draft = $this->draft;
        $data->save();


        $update = new WorkflowUpdate();
        $update->draft = $this->draft;
        $update->updateById($this->workflowId);



        if ($this->workflowStatus->isObjectOfTrait(WorkflowStatusTrait::class)) {

            if ($this->workflowStatus->changeWorkflowStatus) {
                $update = new WorkflowUpdate();
                //$update->draft = $this->draft;
                $update->workflowStatusId = $this->workflowStatus->id;
                $update->updateById($this->workflowId);
            }

        }


        /*
        if ($this->workflowStatus->isObjectOfClass(AbstractSequenceContentType::class)) {
            $update = new WorkflowUpdate();
            $update->workflowStatusId = $this->workflowStatus->id;
            $update->updateById($this->workflowId);
        }

        if ($this->workflowStatus->isObjectOfClass(AbstractWorkflowStatus::class)) {

            if ($this->workflowStatus->changeWorkflowStatus) {
                $update = new WorkflowUpdate();
                $update->draft = $this->draft;
                $update->workflowStatusId = $this->workflowStatus->id;
                $update->updateById($this->workflowId);
            }

        }*/


        //$this->workflowStatus->workflowId = $this->workflowId;


        if ($this->workflowStatus->isObjectOfTrait(WorkflowIdTrait::class)) {
            $this->workflowStatus->workflowId = $this->workflowId;
        }


        /*
        if ($this->workflowStatus->isObjectOfClass(AbstractDraftDataWorkflowStatus::class)) {

            $update = new WorkflowUpdate();
            $update->draft = true;
            $update->updateById($this->workflowId);

        }*/


        if ($this->workflowStatus->isObjectOfTrait(WorkflowStatusTrait::class)) {
            $this->workflowStatus->workflowId = $this->workflowId;

            if ($this->workflowStatus->closingWorkflow) {
                $update = new WorkflowUpdate();
                $update->closed = true;
                $update->updateById($this->workflowId);
            }

        }






        if (!$this->draft) {

            if ($this->workflowStatus->isObjectOfClass(AbstractWorkflowStatus::class)) {
                if ($this->workflowStatus->closingWorkflow) {
                    $this->workflowStatus->closeWorkflow();
                }
            }

            $this->workflowStatus->onCreate($id);

        }


    }

}