<?php

namespace Nemundo\Workflow\Container\Start;


use Nemundo\Workflow\Factory\WorkflowStatusFactory;

class WorkflowStartContainer extends AbstractWorkflowStartContainer
{

    public function getHtml()
    {

        $status = (new WorkflowStatusFactory())->getWorkflowStatus( $this->process->startWorkflowStatusClassName);

        /** @var AbstractWorkflowStartContainer $container */
        $container = new  $status->startContainerClass($this);
        $container->process = $this->process;
        $container->redirectSite = $this->redirectSite;

        return parent::getHtml();

    }

}