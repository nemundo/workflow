<?php

namespace Nemundo\Workflow\App\Workflow\Event;


use Nemundo\App\Content\Event\AbstractContentEvent;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\App\Content\Type\Sequence\AbstractSequenceContentType;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Event\AbstractEvent;
use Nemundo\Workflow\App\Workflow\Builder\StatusChangeBuilder;
use Nemundo\Workflow\App\Workflow\Builder\StatusChangeEvent;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\WorkflowIdTrait;
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

        //(new Debug())->write('workflow event' . $this->workflowId);
        // StatusLog
        // dataId

        $data = new StatusChange();
        $data->workflowStatusId = $this->workflowStatus->id;
        $data->workflowId = $this->workflowId;
        $data->workflowItemId = $id;
        $data->draft = $this->draft;
        $statusChangeId = $data->save();

        //(new Debug())->write($this->workflowStatus->getClassName());


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

            /* $changeEvent = new StatusChangeEvent();
             $changeEvent->workflowId = $this->workflowId;
             $changeEvent->dataId = $id;
             $changeEvent->statusChangeId = $statusChangeId;
             $this->workflowStatus->onChange($changeEvent);*/

            //$this->workflowStatus->workflowId = $this->workflowId;

            //(new Debug())->write('work1'.$this->workflowId);

            //$this->workflowStatus->workflowId = $this->workflowId;

            $this->workflowStatus->onWorkflowCreate($id, $this->workflowId);


        }


        if ($this->workflowStatus->isObjectOfTrait(WorkflowIdTrait::class)) {
            $this->workflowStatus->workflowId = $this->workflowId;
            //  (new Debug())->write('weitergabe');
        }

        $this->workflowStatus->onCreate($id);


        // Workflow
        /* $update = new WorkflowUpdate();

         if ($this->workflowStatus->isObjectOfClass(AbstractWorkflowStatus::class)) {

             if ($this->workflowStatus->changeWorkflowStatus) {
                 $update->workflowStatusId = $this->workflowStatus->id;
             }

             if ($this->workflowStatus->closingWorkflow) {
                 $update->closed = true;
             }
         }


         $update->draft = $this->draft;

         $update->updateById($this->workflowId);


         if (!$this->draft) {

             //$this->workflowStatus->onChange($changeEvent);
             //$this->workflowStatus->onCreate($this->workflowItemId);


             $workflowRow = (new WorkflowReader())->getRowById($this->workflowId);


             $this->workflowStatus->onCreate($this->workflowItemId, $workflowRow->dataId);
             //$this->workflowStatus->onContainerCreate($this->workflowId, $this->workflowItemId);


         }


         /*
         $builder = new StatusChangeBuilder();
         $builder->workflowStatus = $this->workflowStatus;
         $builder->workflowId = $this->workflowId;
         $builder->workflowItemId = $id;
         $builder->changeStatus();*/

    }


}