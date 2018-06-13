<?php

namespace Nemundo\Workflow\Template\WorkflowStatus;

use Nemundo\Workflow\Action\DeadlineWorkflowAction;
use Nemundo\Workflow\App\WorkflowTemplate\Data\DeadlineChange\DeadlineChangeModel;
use Nemundo\Workflow\App\WorkflowTemplate\Data\DeadlineChange\DeadlineChangeReader;
use Nemundo\Workflow\Data\Workflow\WorkflowUpdate;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class DeadlineChangeWorkflowStatus extends AbstractWorkflowStatus
{

    protected function loadWorkflowStatus()
    {

        $this->workflowStatus = 'Deadline Change';
        $this->workflowStatusId = '03d66420-e86f-4f7c-95f6-352a41dc98f3';
        $this->modelClassName = DeadlineChangeModel::class;
        $this->changeWorkflowStatus = false;

    }


    public function onChange($workflowId, $workflowItemId = null)
    {

        $row = (new DeadlineChangeReader())->getRowById($workflowItemId);

        (new DeadlineWorkflowAction($workflowId))
            ->changeDeadline($row->deadline);

/*
        $update = new WorkflowUpdate();
        $update->deadline = $row->deadline;
        $update->updateById($workflowId);*/

    }

}