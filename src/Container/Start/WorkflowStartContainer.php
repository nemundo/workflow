<?php

namespace Nemundo\Workflow\Container\Start;


use Nemundo\Core\Log\LogMessage;
use Nemundo\Workflow\Factory\WorkflowStatusFactory;
use Nemundo\Workflow\Process\AbstractProcess;

class WorkflowStartContainer extends AbstractWorkflowStartContainer
{

    public function getHtml()
    {

        if (!$this->checkObject('process', $this->process, AbstractProcess::class)) {
            return parent::getHtml();
        }


        $status = (new WorkflowStatusFactory())->getWorkflowStatus($this->process->startWorkflowStatusClassName);

        if ($status == null) {
            (new LogMessage())->writeError($this->process->process . ': StartWorkflowStatus is null');
        }


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