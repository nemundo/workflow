<?php

namespace Nemundo\Workflow\Template\WorkflowStatus;


use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class ApprovalWorkflowStatus extends AbstractWorkflowStatus
{

    protected function loadWorkflowStatus()
    {
        $this->workflowStatus = 'Approval';
        $this->workflowStatusId = 'e8135bed-c381-4fb6-b7ef-9ac629df5683';
    }

}