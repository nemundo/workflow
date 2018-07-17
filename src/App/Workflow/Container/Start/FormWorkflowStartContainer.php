<?php

namespace Nemundo\Workflow\App\Workflow\Container\Start;


use Nemundo\Com\Html\Form\AbstractSubmitForm;
use Nemundo\Workflow\Factory\WorkflowStatusFactory;
use Nemundo\Workflow\App\Workflow\Form\WorkflowFormTrait;
use Nemundo\Workflow\Form\WorkflowStartForm;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractFormWorkflowStatus;

class FormWorkflowStartContainer extends AbstractWorkflowStartContainer
{

    public function getHtml()
    {

        $status = (new WorkflowStatusFactory())->getWorkflowStatus($this->process->startWorkflowStatusClass);

        /** @var AbstractSubmitForm|WorkflowFormTrait $form */
        $form = new $status->formClass($this);
        $form->redirectSite = $this->redirectSite;
        $form->appendWorkflowParameter = $this->appendWorkflowParameter;


        return parent::getHtml();

    }

}