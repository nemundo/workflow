<?php

namespace Nemundo\Workflow\App\ToDo\Status;


use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\ImageTemplateContentType;
use Nemundo\Workflow\App\Identification\Model\Identification;
use Nemundo\Workflow\App\Identification\Type\UserIdentificationType;
use Nemundo\Workflow\App\Notification\Builder\NotificationBuilder;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoModel;
use Nemundo\Workflow\App\ToDo\Notification\ToDoNotificationType;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Event\WorkflowEvent;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\DeadlineChangeWorkflowStatus;

class ToDoErfassungWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadData()
    {
        $this->name = 'Todo Erfassung';
        $this->id = '8053c883-b6ef-412a-97a4-172060adeb19';
        $this->statusText = 'ToDo wurde erfasst';
        $this->modelClass = ToDoModel::class;

        $this->addFollowingContentTypeClass(ImageTemplateContentType::class);
        $this->addFollowingContentTypeClass(DeadlineChangeWorkflowStatus::class);

        $this->assignmentIdentification = new Identification();
        $this->assignmentIdentification->identificationType = new UserIdentificationType();
        $this->assignmentIdentification->identificationId= (new UserInformation())->getUserId();






    }


    public function onCreate($dataId)
    {

        $this->assignUser((new UserInformation())->getUserId());


        /*
        $event = new WorkflowEvent();
        $event->
        */



        $builder = new NotificationBuilder();
        $builder->notificationType = new ToDoNotificationType();
        $builder->dataId = $dataId;
        $builder->createNotification();


    }


}