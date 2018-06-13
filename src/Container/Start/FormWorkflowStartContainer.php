<?php

namespace Nemundo\Workflow\Container\Start;


use Nemundo\Workflow\Factory\WorkflowStatusFactory;
use Nemundo\Workflow\Form\WorkflowStartForm;
use Nemundo\Workflow\WorkflowStatus\AbstractFormWorkflowStatus;

class FormWorkflowStartContainer extends AbstractWorkflowStartContainer
{

    public function getHtml()
    {

        $status = (new WorkflowStatusFactory())->getWorkflowStatus($this->process->startWorkflowStatusClassName);

        $form = new $status->formClassName($this);


        return parent::getHtml();

    }

}