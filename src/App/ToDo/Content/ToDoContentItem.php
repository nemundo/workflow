<?php

namespace Nemundo\Workflow\App\ToDo\Content;


use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoReader;
use Nemundo\Workflow\Content\Item\AbstractContentItem;

class ToDoContentItem extends AbstractContentItem
{

    public function getHtml()
    {

        $toDoRow = (new ToDoReader())->getRowById($this->dataId);

        $p = new Paragraph($this);
        $p->content = 'todo: '.$toDoRow->todo;


        return parent::getHtml();
    }

}