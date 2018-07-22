<?php

namespace Nemundo\Workflow\App\Workflow\Event;


use Nemundo\App\Content\Event\AbstractContentEvent;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Event\AbstractEvent;
use Nemundo\Workflow\App\Workflow\Builder\StatusChangeBuilder;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
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


    public function run($id)
    {


        // StatusLog
        // dataId

        $data = new StatusChange();
        $data->workflowStatusId = $this->workflowStatus->id;
        $data->workflowId = $this->workflowId;
        $data->workflowItemId = $id;
        //$data->draft = $this->draft;
        $statusChangeId = $data->save();


        if ($this->workflowStatus->isObjectOfClass(AbstractWorkflowStatus::class)) {


            if ($this->workflowStatus->changeWorkflowStatus) {
                $update = new WorkflowUpdate();
                $update->workflowStatusId = $this->workflowStatus->id;
                $update->updateById($this->workflowId);
            }

            $this->workflowStatus->onWorkflowCreate($id, $this->workflowId);

        }


        //$changeEvent->statusChangeId = $statusChangeId;


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