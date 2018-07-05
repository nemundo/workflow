<?php

namespace Nemundo\Workflow\App\Workflow\Container\Change;


use Nemundo\Core\Debug\Debug;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class WorkflowStatusChangeContainer extends AbstractWorkflowChangeContainer
{

    /**
     * @var AbstractWorkflowStatus
     */
    public $workflowStatus;

    /**
     * @var string
     */
    public $workflowId;

    /**
     * @var bool
     */
    public $appendWorkflowParameter = false;

    /**
     * @var AbstractUrlParameter
     */
    public $parameter;


    public function getHtml()
    {

        /** @var AbstractWorkflowChangeContainer $container */
        $container = new $this->workflowStatus->changeContainerClass($this);
        $container->workflowStatus = $this->workflowStatus;
        $container->workflowId = $this->workflowId;

        if ($this->redirectSite !== null) {

            $container->redirectSite = clone($this->redirectSite);

            if ($this->appendWorkflowParameter) {

                //$container->redirectSite->addParameter(new WorkflowParameter($this->workflowId));


                //$this->parameter->setValue()
                //$container->redirectSite->addParameter(new WorkflowParameter($this->workflowId));


            }

        }

        return parent::getHtml();

    }

}