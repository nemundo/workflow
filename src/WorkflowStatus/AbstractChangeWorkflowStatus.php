<?php

namespace Nemundo\Workflow\WorkflowStatus;


use Nemundo\Workflow\Com\Item\ChangeWorkflowItem;

abstract class AbstractChangeWorkflowStatus extends AbstractWorkflowStatus
{

    public function __construct()
    {

        $this->workflowItemClassName = ChangeWorkflowItem::class;
        parent::__construct();

    }

}