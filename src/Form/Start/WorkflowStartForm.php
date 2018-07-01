<?php

namespace Nemundo\Workflow\Form\Start;


use Nemundo\Design\Bootstrap\Form\BootstrapModelForm;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Workflow\Factory\WorkflowStatusFactory;
use Nemundo\Workflow\Parameter\WorkflowParameter;


class WorkflowStartForm extends BootstrapModelForm
{

    use WorkflowStartFormTrait;

    /**
     * @var bool
     */
    public $draft = false;

    public function getHtml()
    {

        $workflowStatus = (new WorkflowStatusFactory())->getWorkflowStatus($this->process->startWorkflowStatusClassName);
        $this->model = (new ModelFactory())->getModelByClassName($workflowStatus->modelClassName);

        return parent::getHtml();

    }


    protected function onSubmit()
    {

        $workflowItemId = parent::onSubmit();
        $workflowId = $this->saveWorkflow($workflowItemId);

        if ($this->appendWorkflowParameter) {
            $this->redirectSite->addParameter(new WorkflowParameter($workflowId));
        }

        return $workflowItemId;

    }

}