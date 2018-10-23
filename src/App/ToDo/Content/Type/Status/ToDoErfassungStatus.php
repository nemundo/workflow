<?php

namespace Nemundo\Workflow\App\ToDo\Content\Type\Status;


use Nemundo\Workflow\App\ToDo\Content\Form\ToDoTypeForm;
use Nemundo\Workflow\App\ToDo\Content\Type\Process\ToDoProcess;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDo;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoModel;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractModelDataWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;


class ToDoErfassungStatus extends AbstractWorkflowStatus  // AbstractModelDataWorkflowStatus
{

    /**
     * @var string
     */
    public $toDo;

    protected function loadType()
    {

        $this->contentLabel = 'Todo Erfassung';
        $this->contentId = '8053c883-b6ef-412a-97a4-172060adeb19';
        $this->subject = 'ToDo wurde erfasst';
        //$this->modelClass = ToDoModel::class;

        $this->formClass = ToDoTypeForm::class;
        $this->nextContentTypeClass = ToDoDoneStatus::class;

        /*
        $this->addFollowingContentTypeClass(ImageTemplateContentType::class);
        $this->addFollowingContentTypeClass(DeadlineChangeWorkflowStatus::class);

        $this->assignmentIdentification = new Identification();
        $this->assignmentIdentification->identificationType = new UserIdentificationType();
        $this->assignmentIdentification->identificationId= (new UserInformation())->getUserId();*/

    }


    public function saveType()
    {

        $data = new ToDo();
        $data->todo = $this->toDo;
        $this->dataId = $data->save();

        $process = new ToDoProcess();
        $process->parentContentType = $this->parentContentType;
        $process->dataId = $this->dataId;
        $process->saveType();

        $this->parentContentType = $process;

        $this->saveContentLog();


    }



    /*
    public function onCreate()
    {


        $process = new ToDoProcess();
        $process->dataId = $this->dataId;
        $process->saveType();

        $this->parentContentType = $process;


        /*
        $this->assignUser((new UserInformation())->getUserId());


        $row = (new ToDoReader())->getRowById($dataId);


        /*
        $event = new WorkflowEvent();
        $event->
        */

    /*
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
            $builder->createNotification();*/


    //}


}