<?php

namespace Nemundo\Workflow\App\ToDo\Status;


use Nemundo\Core\Type\DateTime\Date;
use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\App\Assignment\Builder\AssignmentBuilder;
use Nemundo\Workflow\App\Assignment\Data\Assignment\Assignment;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\ImageTemplateContentType;
use Nemundo\Workflow\App\Identification\Model\Identification;
use Nemundo\Workflow\App\Identification\Type\UserIdentificationType;
use Nemundo\Workflow\App\Notification\Builder\NotificationBuilder;
use Nemundo\Workflow\App\ToDo\Content\ToDoContentType;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoModel;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoReader;
use Nemundo\Workflow\App\ToDo\Notification\ToDoNotificationType;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Event\WorkflowEvent;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\DeadlineChangeWorkflowStatus;

class ToDoErfassungWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadData()
    {
        $this->contentName = 'Todo Erfassung';
        $this->contentId = '8053c883-b6ef-412a-97a4-172060adeb19';
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


        $row = (new ToDoReader())->getRowById($dataId);


        /*
        $event = new WorkflowEvent();
        $event->
        */


        $builder = new AssignmentBuilder();
        $builder->contentType = new ToDoContentType();
        $builder->dataId = $dataId;
        $builder->subject = $row->todo;
        $builder->assignment->setUserIdentification((new UserInformation())->getUserId());
        $builder->deadline = (new Date())->setNow()->addDay(5);
        $builder->createAssignment();



        $builder = new NotificationBuilder();
        $builder->notificationType = new ToDoNotificationType();
        $builder->dataId = $dataId;
        $builder->createNotification();


    }


}