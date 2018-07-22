<?php

namespace Nemundo\Workflow\App\Workflow\Event;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Event\AbstractEvent;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowBuilder;
use Nemundo\Workflow\App\Workflow\Data\Workflow\Workflow;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowValue;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;
use Nemundo\Workflow\Factory\WorkflowStatusFactory;

class WorkflowStartEvent extends AbstractEvent
{

    /**
     * @var AbstractProcess
     */
    public $process;


    public function run($id)
    {

        $startWorkflowStatus = (new WorkflowStatusFactory())->getWorkflowStatus($this->process->startWorkflowStatusClass);

        $data = new Workflow();
        $data->id = $id;
        $data->processId = $this->process->id;

        $workflowNumber = null;
        if ($this->process->createWorkflowNumber) {
            //$workflowNumber = $this->workflowNumber;
            $number = 0;

            if ($workflowNumber == null) {

                $value = new WorkflowValue();
                $value->field = $value->model->number;
                $value->filter->andEqual($value->model->processId, $this->process->id);
                $number = $value->getMaxValue();

                if ($number == 0) {
                    $number = $this->process->startNumber - 1;  // 1000;
                }

                $number++;

                $workflowNumber = $this->process->prefix . $number;


            }

            $data->number = $number;
            $data->workflowNumber = $workflowNumber;

        }

        //$data->subject = $this->subject;
        //$data->workflowStatusId = $this->process->id;  // $workflowStatus->id;
        $data->dataId = $id;
        $data->save();


        $event = new WorkflowEvent();
        $event->workflowStatus = $startWorkflowStatus;
        $event->workflowId = $id;
        $event->run($id);


        /*
        $update = new ModelUpdate();
        $update->model = $baseModel;
        $update->typeValueList->setModelValue($baseModel->workflow, $workflowId);
        $update->updateById($this->dataId);

        $action = new StatusChangeBuilder();
        $action->workflowStatus =  $workflowStatus;
        $action->workflowId = $workflowId;
        $action->workflowItemId = $this->workflowItemId;
        $action->draft = $this->draft;
        $action->checkFollowingStatus = false;
        $action->changeStatus();


        if ($this->contentType->createWorkflowNumber) {

            $event = new StatusChangeEvent();
            $event->workflowId = $workflowId;

            $action = new SearchIndexWorkflowAction($event);
            $action->addWord($workflowNumber);

        }*/


        /*  $builder = new WorkflowBuilder();
          $builder->contentType = $this->process;
          //$builder->dataId = $dataId;
          $builder->workflowItemId = $id;
          //$builder->draft = $this->draft;
          $workflowId = $builder->createItem();*/


    }

}