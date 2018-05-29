<?php

namespace Nemundo\Workflow\Status;


class DisapprovalWorkflowStatus extends AbstractWorkflowStatus
{

    protected function loadWorkflowStatus()
    {
        $this->status = 'Disapproval';
        $this->statusId = 'f78645ea-e4a8-4f99-9748-13b6d63153d2';
    }

}