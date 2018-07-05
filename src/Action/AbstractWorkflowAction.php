<?php

namespace Nemundo\Workflow\Action;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\App\Workflow\Builder\StatusChangeEvent;


// WorkflowAction
// AbstractWorkflowItem
abstract class AbstractWorkflowAction extends AbstractBase
{

    /**
     * @var string
     */
    //protected $workflowId;

    /**
     * @var StatusChangeEvent
     */
    protected $changeEvent;


    public function __construct(StatusChangeEvent $changeEvent)
    {
        //$this->workflowId = $workflowId;
        $this->changeEvent = $changeEvent;
    }


}