<?php

namespace Nemundo\Workflow\Action;


use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Workflow\Data\Workflow\WorkflowUpdate;

class DeadlineAction extends AbstractWorkflowAction
{

    public function changeDeadline(Date $deadline)
    {

        $update = new WorkflowUpdate();
        $update->deadline = $deadline;
        $update->updateById($this->workflowId);

    }

}