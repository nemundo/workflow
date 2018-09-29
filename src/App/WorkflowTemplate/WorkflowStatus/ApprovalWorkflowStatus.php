<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus;


use Nemundo\Workflow\App\Workflow\Content\Type\AbstractChangeWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;

class ApprovalWorkflowStatus extends AbstractChangeWorkflowStatus
{

    protected function loadData()
    {
        $this->contentName = 'Approval';
        $this->contentId = 'e8135bed-c381-4fb6-b7ef-9ac629df5683';
        $this->subject = 'Workflow was approved';
        $this->statusText = 'Workflow was approved';

    }

}