<?php

namespace Nemundo\Workflow\App\Task\WorkflowStatus;


use Nemundo\Workflow\App\Task\Data\Task\TaskModel;
use Nemundo\Workflow\App\Task\Data\Task\TaskReader;
use Nemundo\Workflow\App\Task\Data\Task\TaskUpdate;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;

class TaskErfassungWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadData()
    {

        $this->name = 'Aufgabe Erfassung';
        $this->workflowStatusText = 'Aufgabe wurde erfasst';
        $this->id = '258ae798-3da1-43ea-ae43-81adaa8da59c';
        $this->modelClass = TaskModel::class;

        $this->addFollowingContentTypeClass(TaskCommentWorkflowStatus::class);
        $this->addFollowingContentTypeClass(TaskDoneWorkflowStatus::class);

    }


    public function onCreate($dataId)
    {

        $update = new TaskUpdate();
        $update->workflowId = $dataId;
        $update->updateById($dataId);


        $taskRow = (new TaskReader())->getRowById($dataId);
        $subject = $taskRow->task;

        //$this->createUserTask($taskRow->responsibleUserId,$personalTaskRow->deadline);*/
        $this->changeDeadline($taskRow->deadline);
        $this->changeSubject($subject);

    }

}