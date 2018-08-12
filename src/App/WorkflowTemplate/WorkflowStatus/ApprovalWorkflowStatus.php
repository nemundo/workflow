<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus;


use Nemundo\Workflow\App\Workflow\Content\Type\AbstractChangeWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;

class ApprovalWorkflowStatus extends AbstractChangeWorkflowStatus
{

    protected function loadData()
    {
        $this->name = 'Approval';
        $this->id = 'e8135bed-c381-4fb6-b7ef-9ac629df5683';
    }

}