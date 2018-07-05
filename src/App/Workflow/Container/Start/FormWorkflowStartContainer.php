<?php

namespace Nemundo\Workflow\App\Workflow\Container\Start;


use Nemundo\Com\Html\Form\AbstractSubmitForm;
use Nemundo\Workflow\Factory\WorkflowStatusFactory;
use Nemundo\Workflow\Form\WorkflowFormTrait;
use Nemundo\Workflow\Form\WorkflowStartForm;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\WorkflowStatus\AbstractFormWorkflowStatus;

class FormWorkflowStartContainer extends AbstractWorkflowStartContainer
{

    public function getHtml()
    {

        $status = (new WorkflowStatusFactory())->getWorkflowStatus($this->process->startWorkflowStatusClassName);

        /** @var AbstractSubmitForm|WorkflowFormTrait $form */
        $form = new $status->formClassName($this);
        $form->redirectSite = $this->redirectSite;
        $form->appendWorkflowParameter = $this->appendWorkflowParameter;


        return parent::getHtml();

    }

}