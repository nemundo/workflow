<?php

namespace Nemundo\Workflow\App\Workflow\Container\Start;


use Nemundo\Workflow\Form\Draft\WorkflowDraftStartForm;


class DraftDataWorkflowStartContainer extends AbstractWorkflowStartContainer
{

    public function getHtml()
    {

        $form = new WorkflowDraftStartForm($this);
        $form->process = $this->process;
        //$form->dataId = $this->da
        $form->redirectSite = $this->redirectSite;
        $form->appendWorkflowParameter = $this->appendWorkflowParameter;

        return parent::getHtml();

    }

}