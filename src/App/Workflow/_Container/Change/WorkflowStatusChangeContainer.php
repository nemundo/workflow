<?php

namespace Nemundo\Workflow\App\Workflow\Container\Change;


use Nemundo\Core\Debug\Debug;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;

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
    public $redirectToItemSite = false;

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

        //if ($this->redirectSite !== null) {

        //    $container->redirectSite = clone($this->redirectSite);

            if ($this->redirectToItemSite) {


                $workflowReader = new WorkflowReader();
                $workflowReader->model->loadProcess();
                $workflowRow = $workflowReader->getRowById($this->workflowId);

                $process = $workflowRow->process->getProcessClassObject();
                $container->redirectSite = $process->getItemSite($workflowRow->dataId);
                //$site->redirect();


                //$container->redirectSite->addParameter(new WorkflowParameter($this->workflowId));


                //$this->parameter->setValue()
                //$container->redirectSite->addParameter(new WorkflowParameter($this->workflowId));


            }

        //}

        return parent::getHtml();

    }

}