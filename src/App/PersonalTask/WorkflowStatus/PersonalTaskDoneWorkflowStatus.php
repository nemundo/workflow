<?php

namespace Nemundo\Workflow\App\PersonalTask\WorkflowStatus;


use Nemundo\Workflow\Action\AssignmentWorkflowAction;
use Nemundo\Workflow\Action\ClosingWorkflowAction;
use Nemundo\Workflow\Action\NotificationWorkflowAction;
use Nemundo\Workflow\App\PersonalTask\Data\Comment\CommentModel;
use Nemundo\Workflow\App\PersonalTask\Data\PersonalTask\PersonalTaskUpdate;
use Nemundo\Workflow\App\Task\Item\TaskItem;
use Nemundo\Workflow\App\Workflow\Builder\StatusChangeEvent;
use Nemundo\Workflow\Template\WorkflowStatus\ClosingWorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractChangeWorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractDataWorkflowStatus;


class PersonalTaskDoneWorkflowStatus extends AbstractDataWorkflowStatus  // AbstractChangeWorkflowStatus
{

    protected function loadData()
    {

        $this->name = 'Erledigt';
        $this->workflowStatusText = 'Aufgabe wurde erledigt';
        $this->id = '4eb59f4f-0a08-42e4-98a3-c8b9922552b7';
        $this->closingWorkflow = true;
        $this->modelClass = CommentModel::class;

    }


    public function onChange(StatusChangeEvent $changeEvent)
    {

        $update = new PersonalTaskUpdate();
        $update->done = true;
        $update->updateById($changeEvent->getDataId());


        (new TaskItem($changeEvent->getDataId()))
            ->archiveTask();


        /*
        (new AssignmentWorkflowAction($changeEvent))
            ->clearUsergroupUserAssignment();

        (new NotificationWorkflowAction($changeEvent))
            ->notificateCreator();*/

    }


}