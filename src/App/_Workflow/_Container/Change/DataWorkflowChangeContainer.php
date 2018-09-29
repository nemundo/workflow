<?php

namespace Nemundo\Workflow\App\Workflow\Container\Change;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Core\Debug\Debug;
use Nemundo\Workflow\App\Workflow\Form\Change\WorkflowChangeForm;

class DataWorkflowChangeContainer extends AbstractWorkflowChangeContainer
{

    public function getHtml()
    {

        $subtitle = new AdminSubtitle($this);
        $subtitle->content = $this->workflowStatus->contentName;


        $form = new WorkflowChangeForm($this);
        $form->workflowStatus = $this->workflowStatus;
        $form->workflowId = $this->workflowId;
        $form->redirectSite = $this->redirectSite;

        return parent::getHtml();

    }


}