<?php

namespace Nemundo\Workflow\App\Workflow\Container\Change;


use Nemundo\Workflow\App\Workflow\Form\Draft\WorkflowDraftChangeForm;
use Nemundo\Workflow\App\Workflow\Form\Change\WorkflowChangeForm;

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