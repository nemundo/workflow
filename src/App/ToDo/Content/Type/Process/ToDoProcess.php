<?php

namespace Nemundo\Workflow\App\ToDo\Content\Type\Process;


use Nemundo\App\Content\Type\Process\AbstractWorkflowProcess;
use Nemundo\Workflow\App\ToDo\Content\View\ToDoView;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoModel;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoReader;
use Nemundo\Workflow\App\ToDo\Content\Type\Status\ToDoErfassungStatus;
use Nemundo\Workflow\App\ToDo\Parameter\ToDoParameter;
use Nemundo\Workflow\App\ToDo\Site\ToDoSite;
use Nemundo\Workflow\App\Workflow\Content\View\ProcessView;

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

        $this->contentName = 'To Do';
        $this->contentId = '567fd76c-f28a-4526-be23-18fa324db6f2';
        $this->baseModelClass = ToDoModel::class;
        $this->viewClass = ToDoView::class;  // ProcessView::class;
        $this->viewSite = ToDoSite::$site;
        $this->parameterClass = ToDoParameter::class;
        $this->nextContentTypeClass = ToDoErfassungStatus::class;

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

}