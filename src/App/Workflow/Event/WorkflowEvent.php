<?php

namespace Nemundo\Workflow\App\Workflow\Event;


use Nemundo\App\Content\Event\AbstractContentEvent;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\App\Content\Type\Sequence\AbstractSequenceContentType;
use Nemundo\App\Content\Type\Sequence\MultiSequenceTrait;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Event\AbstractEvent;
use Nemundo\Workflow\App\Workflow\Builder\StatusChangeBuilder;
use Nemundo\Workflow\App\Workflow\Builder\StatusChangeEvent;
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

        $data = new StatusChange();
        $data->workflowStatusId = $this->workflowStatus->id;
        $data->workflowId = $this->workflowId;
        $data->workflowItemId = $id;
        $data->draft = $this->draft;
        $data->save();


        if ($this->workflowStatus->isObjectOfTrait(WorkflowStatusTrait::class)) {

            if ($this->workflowStatus->changeWorkflowStatus) {
                $update = new WorkflowUpdate();
                $update->draft = $this->draft;
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


        $this->workflowStatus->workflowId = $this->workflowId;


        if ($this->workflowStatus->isObjectOfTrait(WorkflowIdTrait::class)) {
            $this->workflowStatus->workflowId = $this->workflowId;
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