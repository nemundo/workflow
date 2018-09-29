<?php


namespace Nemundo\Workflow\App\Workflow\Form\Change;


use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowBuilder;
use Nemundo\Workflow\App\Workflow\Builder\StatusChangeBuilder;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;

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

        $builder = new StatusChangeBuilder();
        $builder->workflowStatus = $this->workflowStatus;
        $builder->workflowId = $this->workflowId;
        $builder->dataId = $workflowItemId;
        $builder->changeStatus();

    }


}