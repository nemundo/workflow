<?php

namespace Nemundo\Workflow\App\Workflow\Container\Change;


use Nemundo\Workflow\Builder\WorkflowStatusChangeBuilder;

class ChangeWorkflowChangeContainer extends AbstractWorkflowChangeContainer
{

    public function getHtml()
    {

        $builder = new WorkflowStatusChangeBuilder();
        $builder->workflowStatus = $this->workflowStatus;
        $builder->workflowId = $this->workflowId;
        $builder->changeStatus();

        if ($this->redirectSite !== null) {
            $this->redirectSite->redirect();
        }

        return parent::getHtml();

    }

}
