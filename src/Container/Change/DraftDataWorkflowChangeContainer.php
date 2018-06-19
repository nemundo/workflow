<?php

namespace Nemundo\Workflow\Container\Change;


use Nemundo\Workflow\Form\Draft\WorkflowDraftForm;
use Nemundo\Workflow\Form\WorkflowForm;

class DraftDataWorkflowChangeContainer extends AbstractWorkflowChangeContainer
{

    public function getHtml()
    {

        $form = new WorkflowDraftForm($this);
        $form->workflowStatus = $this->workflowStatus;
        $form->workflowId = $this->workflowId;
        $form->redirectSite = $this->redirectSite;

        //$form->redirectSite->addParameter($workflowParameter);


        return parent::getHtml();

    }


}