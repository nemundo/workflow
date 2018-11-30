<?php

namespace Nemundo\Workflow\App\ToDo\Content\View;


use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoReader;

class ToDoErfassungView extends AbstractContentView
{

    public function getHtml()
    {

        $todoRow = (new ToDoReader())->getRowById($this->dataId);

        $p = new Paragraph($this);
        $p->content = $todoRow->todo;

        return parent::getHtml();

    }

}