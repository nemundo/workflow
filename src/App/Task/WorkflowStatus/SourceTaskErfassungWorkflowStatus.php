<?php

namespace Nemundo\Workflow\App\Task\WorkflowStatus;


use Nemundo\Workflow\App\Task\Data\SourceTask\SourceTaskModel;
use Nemundo\Workflow\App\Task\Data\SourceTask\SourceTaskReader;
use Nemundo\Workflow\App\Task\Data\SourceTask\SourceTaskUpdate;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowUpdate;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\DeadlineChangeWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\UserAssignmentChangeWorkflowStatus;


class SourceTaskErfassungWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadData()
    {

        $this->contentName = 'Source Aufgabe Erfassung';
        $this->statusText = 'Source Aufgabe wurde erfasst';
        $this->contentId = 'c935da6f-e977-4799-8385-14aaeafc99c2';
        $this->modelClass = SourceTaskModel::class;

        $this->addFollowingContentTypeClass(TaskCommentWorkflowStatus::class);
        $this->addFollowingContentTypeClass(SourceTaskDoneWorkflowStatus::class);
        $this->addFollowingContentTypeClass(DeadlineChangeWorkflowStatus::class);
        $this->addFollowingContentTypeClass(UserAssignmentChangeWorkflowStatus::class);

        $this->nextContentTypeClass = SourceTaskDoneWorkflowStatus::class;

    }


    public function onCreate($dataId)
    {

        $update = new SourceTaskUpdate();
        $update->workflowId = $dataId;
        $update->updateById($dataId);

        $sourceTaskRow = (new SourceTaskReader())->getRowById($dataId);

        $this->assignUser($sourceTaskRow->assignment->identificationId);

        /*
        $update = new WorkflowUpdate();
        $update->identificationTypeId = $sourceTaskRow->assignment->identificationType->id;  // (new UserIdentificationType())->id;
        $update->identificationId = $sourceTaskRow->assignment->identificationId;  // $userId;
        $update->updateById($this->workflowId);*/


        $this->changeDeadline($sourceTaskRow->deadline);
        $this->changeSubject($sourceTaskRow->task);


    }

}