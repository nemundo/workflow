<?php

namespace Nemundo\Workflow\App\Task\WorkflowStatus;


use Nemundo\Workflow\App\Task\Data\Task\TaskUpdate;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractChangeWorkflowStatus;


class TaskDoneWorkflowStatus extends AbstractChangeWorkflowStatus
{

    protected function loadData()
    {

        $this->contentName = 'Erledigt';
        $this->statusText = 'Aufgabe wurde erledigt';
        $this->contentId = '0ecf9bad-c73a-4c53-85c6-19cbdc5d8f87';
        $this->closingWorkflow = true;

    }


    public function onCreate($dataId)
    {

        $update = new TaskUpdate();
        $update->archive = true;
        $update->updateById($this->workflowId);

        //$this->archiveTask();

    }

}