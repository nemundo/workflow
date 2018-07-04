<?php

namespace Nemundo\Workflow\Template\WorkflowStatus;


use Nemundo\Workflow\WorkflowStatus\AbstractChangeWorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class ApprovalWorkflowStatus extends AbstractChangeWorkflowStatus
{

    protected function loadData()
    {
        $this->name = 'Approval';
        $this->id = 'e8135bed-c381-4fb6-b7ef-9ac629df5683';
    }

}