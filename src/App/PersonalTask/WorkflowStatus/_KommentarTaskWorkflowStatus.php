<?php

namespace Nemundo\Workflow\App\PersonalTask\WorkflowStatus;


use Nemundo\Workflow\Action\NotificationWorkflowAction;
use Nemundo\Workflow\Builder\StatusChangeEvent;
use Nemundo\Workflow\Com\Item\WorkflowItem;
use Nemundo\Workflow\Factory\WorkflowDataId;
use Nemundo\Workflow\WorkflowStatus\AbstractDataWorkflowStatus;
use Schleuniger\App\Task\Data\Task\TaskReader;
use Schleuniger\App\Task\Data\TaskComment\TaskCommentModel;

class KommentarTaskWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadData()
    {

        $this->name = 'Kommentar';
        $this->workflowStatusText = 'Aufgabe wurde kommentiert';
        $this->id = '6ad1ddc1-04ff-47d6-bfaa-2677238c7de4';
        $this->modelClass = TaskCommentModel::class;
        //$this->workflowItemClassName = WorkflowItem::class;

        $this->addFollowingStatusClassName(ProzesssteuerungTaskDoneWorkflowStatus::class);
        $this->addFollowingStatusClassName(KommentarTaskWorkflowStatus::class);


    }


    public function onChange(StatusChangeEvent $changeEvent)
    {

        //$dataId = (new WorkflowDataId())->getDataId($workflowId);
        $taskRow = (new TaskReader())->getRowById($changeEvent->getDataId());

        (new NotificationWorkflowAction($changeEvent))
            ->notificateUser($taskRow->workflow->userId);


        //$this->notificateUser($taskRow->workflow->userId);

    }

}