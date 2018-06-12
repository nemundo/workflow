<?php

namespace Nemundo\Workflow\Action;


use Nemundo\Core\Base\AbstractBase;


// WorkflowAction
// AbstractWorkflowItem
abstract class AbstractWorkflowAction extends AbstractBase
{

    /**
     * @var string
     */
    protected $workflowId;


    public function __construct($workflowId)
    {
        $this->workflowId = $workflowId;
    }


}