<?php

namespace Nemundo\Workflow\Container\Start;


use Nemundo\Workflow\Form\WorkflowStartForm;

class DataWorkflowStartContainer extends AbstractWorkflowStartContainer
{

    public function getHtml()
    {

        $form = new WorkflowStartForm($this);
        $form->process = $this->process;
        $form->redirectSite = $this->redirectSite;

        return parent::getHtml();

    }

}