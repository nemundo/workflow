<?php

namespace Nemundo\Workflow\Form;


use Nemundo\Design\Bootstrap\Form\BootstrapModelForm;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Workflow\Builder\WorkflowBuilder;
use Nemundo\Workflow\Factory\WorkflowStatusFactory;
use Nemundo\Workflow\Parameter\WorkflowParameter;


class WorkflowStartForm extends BootstrapModelForm
{

    use WorkflowFormTrait;

    public function getHtml()
    {

        /*
        if (is_null($this->workflowStatus->modelClassName)) {
            LogMessage::writeError('Workflow Form: No Model Class Name');
            return;
        }*/


        //$workflowReader = new WorkflowReader();
        //$workflowReader->model->loadWorkflowStatus();

        $this->workflowStatus = (new WorkflowStatusFactory())->getWorkflowStatus($this->process->startWorkflowStatusClassName);
        $this->model = (new ModelFactory())->getModelByClassName($this->workflowStatus->modelClassName);

        return parent::getHtml();

    }


    protected function onSubmit()
    {

        $workflowItemId = parent::onSubmit();

        $builder = new WorkflowBuilder();
        $builder->process = $this->process;
        $builder->workflowItemId = $workflowItemId;
        //$builder->workflowStatus = $this->workflowStatus;
        //$builder->dataId = $workflowItemId; // $dataId;
        $workflowId = $builder->createItem();

        if ($this->appendWorkflowParameter) {
            $this->redirectSite->addParameter(new WorkflowParameter($workflowId));
        }

        return $workflowItemId;

    }

}