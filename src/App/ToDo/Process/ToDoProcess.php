<?php

namespace Nemundo\Workflow\App\ToDo\Process;


use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoModel;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoReader;
use Nemundo\Workflow\App\ToDo\Status\ToDoErfassungWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;

class ToDoProcess extends AbstractProcess
{

    protected function loadData()
    {
        $this->name = 'Todo';
        $this->id = '567fd76c-f28a-4526-be23-18fa324db6f2';
        $this->modelClass = ToDoModel::class;

        $this->createWorkflowNumber = false;

        //$this->parameterClass = WorkflowParameter::class;
        $this->startWorkflowStatusClass = ToDoErfassungWorkflowStatus::class;
    }


    public function getSubject($dataId)
    {

        $row = (new ToDoReader())->getRowById($dataId);
        $subject = $row->todo;
        return $subject;

    }

}