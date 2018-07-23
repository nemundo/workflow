<?php

namespace Nemundo\Workflow\App\Workflow\Container\Start;


use Nemundo\Workflow\App\Workflow\Form\Start\WorkflowStartForm;

class DataWorkflowStartContainer extends AbstractWorkflowStartContainer
{

    public function getHtml()
    {

        $form = new WorkflowStartForm($this);
        $form->process = $this->process;
        $form->redirectSite = $this->redirectSite;
        $form->appendWorkflowParameter= $this->appendWorkflowParameter;

        return parent::getHtml();

    }

}