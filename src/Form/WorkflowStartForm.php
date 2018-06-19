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

    /**
     * @var bool
     */
    public $draft = false;

    public function getHtml()
    {

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
        $builder->draft = $this->draft;
        $workflowId = $builder->createItem();

        if ($this->appendWorkflowParameter) {
            $this->redirectSite->addParameter(new WorkflowParameter($workflowId));
        }

        return $workflowItemId;

    }

}