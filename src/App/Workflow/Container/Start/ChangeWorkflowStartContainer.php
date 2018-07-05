<?php

namespace Nemundo\Workflow\App\Workflow\Container\Start;


use Nemundo\Workflow\App\Workflow\Builder\WorkflowBuilder;
use Nemundo\Workflow\Parameter\WorkflowParameter;

class ChangeWorkflowStartContainer extends AbstractWorkflowStartContainer
{


    public function getHtml()
    {

        $builder = new WorkflowBuilder();
        $builder->contentType = $this->process;
        $workflowId = $builder->createItem();

        if ($this->redirectSite !== null) {
            $site = clone($this->redirectSite);

            if ($this->appendWorkflowParameter) {
                $site->addParameter(new WorkflowParameter($workflowId));
            }

            $site->redirect();

        }


        return parent::getHtml();
    }

}