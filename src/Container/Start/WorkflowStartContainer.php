<?php

namespace Nemundo\Workflow\Container\Start;


use Nemundo\Workflow\Factory\WorkflowStatusFactory;

class WorkflowStartContainer extends AbstractWorkflowStartContainer
{

    public function getHtml()
    {

        $status = (new WorkflowStatusFactory())->getWorkflowStatus($this->process->startWorkflowStatusClassName);

        /** @var AbstractWorkflowStartContainer $container */
        $container = new  $status->startContainerClass($this);
        $container->process = $this->process;

        if ($this->redirectSite !== null) {
            $container->redirectSite = clone($this->redirectSite);
            $container->appendWorkflowParameter = $this->appendWorkflowParameter;
        }

        return parent::getHtml();

    }

}