<?php

namespace Nemundo\Workflow\App\ToDo\Content\Type\Process;


use Nemundo\Workflow\App\Workflow\Content\Process\AbstractWorkflowProcess;
use Nemundo\User\Type\UserSession;
use Nemundo\Workflow\App\Assignment\Builder\AssignmentBuilder;
use Nemundo\Workflow\App\ToDo\Content\Type\Status\ToDoErfassungStatus;
use Nemundo\Workflow\App\ToDo\Content\View\ToDoView;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDo;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoModel;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoReader;
use Nemundo\Workflow\App\ToDo\Parameter\ToDoParameter;
use Nemundo\Workflow\App\ToDo\Site\ToDoSite;

class ToDoProcess extends AbstractWorkflowProcess
{

    /**
     * @var string
     */
    public $toDo;

    /**
     * @var bool
     */
    public $done;


    protected function loadType()
    {

        $this->contentLabel = 'To Do';
        $this->contentName = 'to_do';
        $this->contentId = '567fd76c-f28a-4526-be23-18fa324db6f2';

        $this->baseModelClass = ToDoModel::class;
        $this->viewClass = ToDoView::class;
        $this->viewSite = ToDoSite::$site;
        $this->parameterClass = ToDoParameter::class;
        $this->nextContentTypeClass = ToDoErfassungStatus::class;
        $this->changeStatus = false;

    }


    protected function loadData()
    {

        $toDoRow = (new ToDoReader())->getRowById($this->dataId);

        $this->toDo = $toDoRow->todo;
        $this->done = $toDoRow->done;


    }


    public function getSubject()
    {

        $subject = 'New To Do';
        if ($this->dataId !== null) {
            $row = (new ToDoReader())->getRowById($this->dataId);
            $subject = $row->todo;
        }
        return $subject;

    }


    public function saveType()
    {

        $data = new ToDo();
        $data->todo = $this->toDo;
        $this->dataId = $data->save();

        $this->saveContentLog();

        $status = new ToDoErfassungStatus();
        $status->dataId = $this->dataId;
        $status->parentContentType = $this;
        $status->saveType();

        $assignment = new AssignmentBuilder($this);
        $assignment->createUserAssignment((new UserSession())->userId);

    }

}