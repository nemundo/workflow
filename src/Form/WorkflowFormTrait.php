<?php


namespace Nemundo\Workflow\Form;

use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Workflow\Builder\WorkflowBuilder;
use Nemundo\Workflow\Process\AbstractProcess;
use Nemundo\Workflow\WorkflowStatus\AbstractDataWorkflowStatus;

trait WorkflowFormTrait
{

    /**
     * @var AbstractProcess
     */
    public $process;

    /**
     * @var AbstractDataWorkflowStatus
     */
    public $workflowStatus;

    /**
     * @var string
     */
    public $workflowId;

    /**
     * @var bool
     */
    public $appendWorkflowParameter = false;




    protected function saveWorkflow($workflowItemId) {

        //$workflowItemId = parent::onSubmit();

        if ($this->workflowId !== null) {
            $this->workflowStatus->onChange($this->workflowId, $workflowItemId);

        } else {

            $model = (new ModelFactory())->getModelByClassName($this->process->baseModelClassName);

            /*$data = new ModelData();
            $data->model = $model;
            $dataId = $data->save();*/


            $builder = new WorkflowBuilder();
            $builder->process = $this->process;
            //$builder->workflowStatus = $this->workflowStatus;
            $builder->workflowItemId = $workflowItemId;
            $workflowId = $builder->createItem();


            /*
            $data = new ModelUpdate();
            $data->model = $model;
            $data->typeValueList->setModelValue($model->wor)
            $dataId = $data->save();
            */

            //$this->workflowStatus->draftMode = false;
            //$this->workflowStatus->runWorkflow($workflowId, $workflowItemId);

        }


        return $workflowItemId;

    }



}