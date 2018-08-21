<?php

namespace Nemundo\Workflow\App\Task\WorkflowStatus;


use Nemundo\Workflow\App\Task\Data\Comment\CommentModel;
use Nemundo\Workflow\App\Task\Data\Task\TaskUpdate;
use Nemundo\Workflow\App\Task\Item\TaskItem;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;


class TaskDoneWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadData()
    {

        $this->name = 'Erledigt';
        $this->workflowStatusText = 'Aufgabe wurde erledigt';
        $this->id = '4eb59f4f-0a08-42e4-98a3-c8b9922552b7';
        $this->closingWorkflow = true;
        $this->modelClass = CommentModel::class;

    }


    public function onCreate($dataId)
    {

        $update = new TaskUpdate();
        $update->done = true;
        $update->updateById($this->workflowId);


        (new TaskItem($this->workflowId))
            ->archiveTask();

    }


}