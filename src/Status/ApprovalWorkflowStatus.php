<?php

namespace Nemundo\Workflow\Status;


class ApprovalWorkflowStatus extends AbstractWorkflowStatus
{

    protected function loadWorkflowStatus()
    {
        $this->status = 'Approval';
        $this->statusId = 'e8135bed-c381-4fb6-b7ef-9ac629df5683';
    }

}