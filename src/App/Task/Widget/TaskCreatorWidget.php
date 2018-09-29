<?php

namespace Nemundo\Workflow\App\Task\Widget;

use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Workflow\App\Task\Data\SourceTask\SourceTaskForm;
use Nemundo\Workflow\App\Task\Data\Task\TaskForm;
use Nemundo\Workflow\App\Task\Form\ToDoTaskForm;

class TaskCreatorWidget extends AdminWidget
{

    public function getHtml()
    {

        $this->widgetTitle = 'Aufgabe erstellen';


        //$form = new TaskForm($this);

        //new SourceTaskForm($this);


        new ToDoTaskForm($this);


        return parent::getHtml();

    }


}