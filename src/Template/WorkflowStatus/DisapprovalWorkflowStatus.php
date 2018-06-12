<?php

namespace Nemundo\Workflow\Template\WorkflowStatus;

use Nemundo\Workflow\WorkflowStatus\AbstractChangeWorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class DisapprovalWorkflowStatus extends AbstractChangeWorkflowStatus
{

    protected function loadWorkflowStatus()
    {
        $this->workflowStatus = 'Disapproval';
        $this->workflowStatusId = 'f78645ea-e4a8-4f99-9748-13b6d63153d2';
    }

}