<?php


namespace Nemundo\Workflow\Form;

use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Workflow\Builder\WorkflowBuilder;
use Nemundo\Workflow\Builder\WorkflowStatusChangeBuilder;
use Nemundo\Workflow\Process\AbstractProcess;
use Nemundo\Workflow\WorkflowStatus\AbstractDataWorkflowStatus;

trait WorkflowFormTrait
{

    /**
     * @var AbstractProcess
     */
    public $process;

    /**
     * @var AbstractDataWorkflowStatus
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


    protected function saveWorkflow($workflowItemId)
    {

        $builder = new WorkflowBuilder();
        $builder->process = $this->process;
        //$builder->dataId = $workflowItemId;
        $builder->workflowItemId = $workflowItemId;
        //$builder->draft = $this->draft;
        $workflowId = $builder->createItem();

        return $workflowId;

    }


    protected function saveWorkflowItem($workflowItemId)
    {


        $builder = new WorkflowStatusChangeBuilder();
        $builder->workflowStatus = $this->workflowStatus;
        $builder->workflowId = $this->workflowId;
        $builder->workflowItemId = $workflowItemId;
        $builder->changeStatus();

    }


}