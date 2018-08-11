<?php

namespace Nemundo\Workflow\App\PersonalTask\WorkflowStatus;


use Nemundo\Workflow\Action\SubjectWorkflowAction;
use Nemundo\Workflow\App\Inbox\Builder\InboxBuilder;
use Nemundo\Workflow\App\PersonalTask\Data\PersonalTask\PersonalTaskModel;
use Nemundo\Workflow\App\PersonalTask\Data\PersonalTask\PersonalTaskReader;
use Nemundo\Workflow\App\PersonalTask\Data\PersonalTask\PersonalTaskUpdate;
use Nemundo\Workflow\App\PersonalTask\Process\PersonalTaskProcess;
use Nemundo\Workflow\App\SearchEngine\Builder\SearchIndexBuilder;
use Nemundo\Workflow\App\Task\Builder\TaskBuilder;
use Nemundo\Workflow\App\Workflow\Builder\StatusChangeEvent;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowUpdate;


class PersonalTaskErfassungWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadData()
    {

        $this->name = 'Aufgabe Erfassung';
        $this->workflowStatusText = 'Aufgabe wurde erfasst';
        $this->id = 'f2736f64-d659-4d2f-b73c-7a16b77c28ee';
        $this->modelClass = PersonalTaskModel::class;

        $this->addFollowingContentTypeClass(CommentTaskWorkflowStatus::class);
        $this->addFollowingContentTypeClass(PersonalTaskDoneWorkflowStatus::class);

    }


    public function onCreate($dataId)
    {

        $update = new PersonalTaskUpdate();
        $update->workflowId = $dataId;
        $update->updateById($dataId);

        $personalTaskRow = (new PersonalTaskReader())->getRowById($dataId);
        $subject = $personalTaskRow->workflow->workflowNumber . ' ' . $personalTaskRow->task;

        $this->createUserTask($personalTaskRow->responsibleUserId,$personalTaskRow->deadline);
        $this->changeDeadline($personalTaskRow->deadline);
        $this->changeSubject($subject);

    }

}