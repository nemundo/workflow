<?php

namespace Nemundo\Workflow\Container\Change;


use Nemundo\Workflow\Form\Draft\WorkflowDraftChangeForm;
use Nemundo\Workflow\Form\WorkflowChangeForm;

class DraftDataWorkflowChangeContainer extends AbstractWorkflowChangeContainer
{

    public function getHtml()
    {

        $form = new WorkflowDraftChangeForm($this);
        $form->workflowStatus = $this->workflowStatus;
        $form->workflowId = $this->workflowId;
        $form->redirectSite = $this->redirectSite;

        //$form->redirectSite->addParameter($workflowParameter);


        return parent::getHtml();

    }


}