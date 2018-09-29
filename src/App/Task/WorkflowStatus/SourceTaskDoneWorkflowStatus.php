<?php

namespace Nemundo\Workflow\App\Task\WorkflowStatus;


use Nemundo\Workflow\App\Task\Data\SourceTask\SourceTaskUpdate;
use Nemundo\Workflow\App\Task\Data\Task\TaskUpdate;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractChangeWorkflowStatus;


class SourceTaskDoneWorkflowStatus extends AbstractChangeWorkflowStatus
{

    protected function loadData()
    {

        $this->contentName = 'Erledigt';
        $this->statusText = 'Aufgabe wurde erledigt';
        $this->contentId = '91077ac2-1a9d-4507-af4f-e3d42a892d5e';
        $this->closingWorkflow = true;

    }


    public function onCreate($dataId)
    {

        $update = new SourceTaskUpdate();
        $update->done = true;
        $update->updateById($this->workflowId);

        $this->clearAssignment();

    }

}