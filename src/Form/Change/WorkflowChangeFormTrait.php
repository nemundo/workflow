<?php


namespace Nemundo\Workflow\Form\Change;

use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Workflow\Builder\WorkflowBuilder;
use Nemundo\Workflow\Builder\WorkflowStatusChangeBuilder;
use Nemundo\Workflow\Process\AbstractProcess;
use Nemundo\Workflow\WorkflowStatus\AbstractDataWorkflowStatus;

trait WorkflowChangeFormTrait
{

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



    protected function saveWorkflowItem($workflowItemId)
    {

        $builder = new WorkflowStatusChangeBuilder();
        $builder->workflowStatus = $this->workflowStatus;
        $builder->workflowId = $this->workflowId;
        $builder->workflowItemId = $workflowItemId;
        $builder->changeStatus();

    }


}