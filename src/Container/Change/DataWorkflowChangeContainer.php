<?php

namespace Nemundo\Workflow\Container\Change;


use Nemundo\Workflow\Form\WorkflowForm;

class DataWorkflowChangeContainer extends AbstractWorkflowChangeContainer
{

    public function getHtml()
    {

        $form = new WorkflowForm($this);
        $form->workflowStatus = $this->workflowStatus;
        $form->workflowId = $this->workflowId;
        $form->redirectSite = $this->redirectSite;
        //$form->redirectSite->addParameter($workflowParameter);


        return parent::getHtml();

    }


}