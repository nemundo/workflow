<?php

namespace Nemundo\Workflow\Container\Change;


use Nemundo\Workflow\Builder\WorkflowStatusChangeBuilder;
use Nemundo\Workflow\Form\WorkflowForm;

class ChangeWorkflowChangeContainer extends AbstractWorkflowChangeContainer
{

    public function getHtml()
    {

        $builder = new WorkflowStatusChangeBuilder();
        $builder->workflowStatus = $this->workflowStatus;
        $builder->workflowId = $this->workflowId;
        $builder->changeStatus();

        //(new UrlReferer())->redirect();
        if ($this->redirectSite !== null) {
            $this->redirectSite->redirect();
        }
        return parent::getHtml();

    }


}