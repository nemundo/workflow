<?php


namespace Nemundo\Workflow\Form;

use Nemundo\Model\Data\ModelData;
use Nemundo\Model\Factory\ModelFactory;
use Schleuniger\App\Application\Type\AbstractWorkflowApplication;
use Nemundo\Workflow\Builder\WorkflowBuilder;
use Nemundo\Workflow\Status\AbstractWorkflowStatus;

trait WorkflowFormTrait
{

    /**
     * @var AbstractWorkflowApplication
     */
    public $application;

    /**
     * @var AbstractWorkflowStatus
     */
    public $workflowStatus;

    /**
     * @var string
     */
    public $workflowId;


    protected function saveWorkflow($workflowItemId) {

        //$workflowItemId = parent::onSubmit();

        if ($this->workflowId !== null) {
            $this->workflowStatus->runWorkflow($this->workflowId, $workflowItemId);

        } else {

            $model = (new ModelFactory())->getModelByClassName($this->application->baseModelClassName);

            /*$data = new ModelData();
            $data->model = $model;
            $dataId = $data->save();*/


            $builder = new WorkflowBuilder();
            $builder->application = $this->application;
            $builder->workflowStatus = $this->workflowStatus;
            $builder->dataId = $workflowItemId;
            $workflowId = $builder->createItem();


            /*
            $data = new ModelUpdate();
            $data->model = $model;
            $data->typeValueList->setModelValue($model->wor)
            $dataId = $data->save();
            */

            $this->workflowStatus->draftMode = false;

            $this->workflowStatus->runWorkflow($workflowId, $workflowItemId);

        }


        return $workflowItemId;

    }



}