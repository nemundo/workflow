<?php

namespace Nemundo\Workflow\App\PersonalTask\WorkflowStatus;


use Nemundo\Workflow\Action\AssignmentWorkflowAction;
use Nemundo\Workflow\Action\DeadlineWorkflowAction;
use Nemundo\Workflow\Action\NotificationWorkflowAction;
use Nemundo\Workflow\Action\SubjectWorkflowAction;
use Nemundo\Workflow\App\PersonalTask\Data\PersonalTask\PersonalTaskModel;
use Nemundo\Workflow\App\PersonalTask\Data\PersonalTask\PersonalTaskReader;
use Nemundo\Workflow\App\PersonalTask\Process\PersonalTaskProcess;
use Nemundo\Workflow\App\Task\Builder\TaskBuilder;
use Nemundo\Workflow\Builder\StatusChangeEvent;
use Nemundo\Workflow\Data\UserNotification\UserNotification;
use Nemundo\Workflow\Template\WorkflowStatus\ClosingWorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractDataWorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractFormWorkflowStatus;
use Schleuniger\App\Task\Data\Task\TaskModel;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;
use Schleuniger\App\Task\Data\Task\TaskReader;
use Schleuniger\App\Task\Form\TaskWorkflowForm;

class PersonalTaskErfassungWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadType()
    {

        $this->name = 'Aufgabe Erfassung';
        $this->workflowStatusText = 'Aufgabe wurde erfasst';
        $this->id = 'f2736f64-d659-4d2f-b73c-7a16b77c28ee';
        //$this->formClassName = TaskWorkflowForm::class;
        $this->modelClassName = PersonalTaskModel::class;


        //$this->addFollowingStatusClassName(ProzesssteuerungTaskDoneWorkflowStatus::class);
        $this->addFollowingStatusClassName(PersonalTaskErledigtWorkflowStatus::class);
        //$this->addFollowingStatusClassName(KommentarTaskWorkflowStatus::class);
        //$this->addFollowingStatusClassName(ClosingWorkflowStatus::class);
        //$this->addFollowingStatusClassName(DeadlineChangeWorkflowStatus::class);
        //$this->addFollowingStatusClassName(UserAssignmentChangeWorkflowStatus::class);

    }

    public function onChange(StatusChangeEvent $changeEvent)
    {

        $personalTaskRow = (new PersonalTaskReader())->getRowById($changeEvent->workflowItemId);


        $builder = new TaskBuilder();
        $builder->contentType = new PersonalTaskProcess();
        $builder->task = $personalTaskRow->task;
        $builder->dataId = $changeEvent->workflowId;
        $builder->deadline = $personalTaskRow->deadline;
        $builder->timeEffort = $personalTaskRow->timeEffort;
        $builder->createUserTask($personalTaskRow->responsibleUserId);


        /*
        (new SubjectWorkflowAction($changeEvent))
            ->changeSubject($taskRow->task);

        (new AssignmentWorkflowAction($changeEvent))
            ->assignUser($taskRow->verantwortlicherId);

        (new DeadlineWorkflowAction($changeEvent))
            ->changeDeadline($taskRow->erledigenBis);

        (new NotificationWorkflowAction($changeEvent))
            ->notificateUser($taskRow->verantwortlicherId);*/

    }

}