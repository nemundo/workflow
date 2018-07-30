<?php

namespace Nemundo\Workflow\App\Workflow\Form\Start;


use Nemundo\Package\Bootstrap\Form\BootstrapModelForm;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
use Nemundo\Workflow\Factory\WorkflowStatusFactory;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;


class WorkflowStartForm extends BootstrapModelForm
{

    use WorkflowStartFormTrait;

    /**
     * @var bool
     */
    public $draft = false;

    public function getHtml()
    {

        /** @var AbstractWorkflowStatus $workflowStatus */
        $workflowStatus = (new WorkflowStatusFactory())->getWorkflowStatus($this->process->startWorkflowStatusClass);

        $this->model = (new ModelFactory())->getModelByClassName($workflowStatus->modelClass);

        return parent::getHtml();

    }


    protected function onSubmit()
    {

        $workflowItemId = parent::onSubmit();
        $workflowId = $this->saveWorkflow($workflowItemId);

        if ($this->appendWorkflowParameter) {
            //$this->redirectSite->addParameter(new WorkflowParameter($workflowId));

            /** @var AbstractUrlParameter $parameter */
          /*  $parameter = new $this->process->parameterClass();
            $parameter->setValue($workflowItemId);
            $this->redirectSite->addParameter($parameter);*/

        }


        $this->process->onCreate($workflowItemId);


        return $workflowItemId;

    }

}