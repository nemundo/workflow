<?php

namespace Nemundo\Workflow\Builder;


use Nemundo\Model\Data\ModelData;
use Nemundo\Model\Data\ModelUpdate;
use Nemundo\Model\Factory\ModelFactory;
use Schleuniger\App\Application\Builder\AbstractApplicationBuilder;
use Schleuniger\App\Application\Type\AbstractWorkflowApplication;
use Nemundo\Workflow\Data\Workflow\Workflow;
use Nemundo\Workflow\Data\Workflow\WorkflowValue;
use Nemundo\Workflow\Status\AbstractWorkflowStatus;

class WorkflowBuilder extends AbstractApplicationBuilder
{

    /**
     * @var string
     */
    public $workflowNumber;

    /**
     * @var string
     */
    public $workflowSubject;

    /**
     * @var AbstractWorkflowStatus
     */
    public $workflowStatus;


    protected function loadApplication()
    {

    }


    public function createItem()
    {


        if (!$this->checkObject('application', $this->application, AbstractWorkflowApplication::class)) {
            return;
        }

        if (!$this->checkObject('workflowStatus', $this->workflowStatus, AbstractWorkflowStatus::class)) {
            return;
        }

        /*
        if (!$this->checkProperty(['workflowSubject','dataId'])) {
            return;
        }*/


        $baseModel = (new ModelFactory())->getModelByClassName($this->application->baseModelClassName);


        if ($this->dataId == null) {


            $data = new ModelData();
            $data->model = $baseModel;
            $this->dataId = $data->save();

        }


        $workflowNumber = $this->workflowNumber;
        $number = 0;

        if ($workflowNumber == null) {

            $value = new WorkflowValue();
            $value->field = $value->model->number;
            $value->filter->andEqual($value->model->applicationId, $this->application->applicationId);
            $number = $value->getMaxValue();

            if ($number == 0) {
                $number = 1000;
            }

            $number++;

            $workflowNumber = $this->application->prefix . '-' . $number;

        }


        $data = new Workflow();
        $data->applicationId = $this->application->applicationId;
        $data->number = $number;
        $data->workflowNumber = $workflowNumber;
        $data->workflowSubject = $this->workflowSubject;
        $data->workflowStatusId = $this->workflowStatus->statusId;
        $data->dataId = $this->dataId;
        $workflowId = $data->save();


        $update = new ModelUpdate();
        $update->model = $baseModel;
        $update->typeValueList->setModelValue($baseModel->workflow, $workflowId);
        $update->updateById($this->dataId);


        //$this->workflowStatus->runWorkflow($workflowId, $this->dataId);

        return $workflowId;


    }


}