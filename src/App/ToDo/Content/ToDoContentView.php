<?php

namespace Nemundo\Workflow\App\ToDo\Content;


use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoReader;
use Nemundo\App\Content\View\AbstractContentView;

class ToDoContentView extends AbstractContentView
{

    public function getHtml()
    {

        $toDoRow = (new ToDoReader())->getRowById($this->dataId);

        $p = new Paragraph($this);
        $p->content = 'todo: '.$toDoRow->todo;


        return parent::getHtml();
    }

}