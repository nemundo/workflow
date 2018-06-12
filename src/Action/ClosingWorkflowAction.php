<?php

namespace Nemundo\Workflow\Action;


use Nemundo\Workflow\Data\Workflow\WorkflowUpdate;

class ClosingWorkflowAction extends AbstractWorkflowAction
{

    public function closeWorkflow()
    {

        $update = new WorkflowUpdate();
        $update->closed = true;
        $update->updateById($this->workflowId);

    }

}