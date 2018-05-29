<?php

namespace Nemundo\Workflow\Status;


use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Workflow\Data\DeadlineChange\DeadlineChangeModel;
use Nemundo\Workflow\Data\Workflow\WorkflowUpdate;

class DeadlineChangeWorkflowStatus extends AbstractWorkflowStatus
{

    /**
     * @var Date
     */
    public $deadline;

    protected function loadWorkflowStatus()
    {

        $this->status = 'Deadline Change';
        $this->statusId = '03d66420-e86f-4f7c-95f6-352a41dc98f3';
        $this->modelClassName = DeadlineChangeModel::class;
        $this->changeWorkflowStatus = false;

    }


    protected function onChange($workflowId, $workflowItemId = null)
    {

        $update = new WorkflowUpdate();
        $update->deadline = $this->deadline;
        $update->updateById($workflowId);

    }

}