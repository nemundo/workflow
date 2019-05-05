<?php

namespace Nemundo\Workflow\App\ToDo\Content\View;


use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoReader;

class ToDoErfassungView extends AbstractContentView
{

    public function getContent()
    {

        $todoRow = (new ToDoReader())->getRowById($this->dataId);

        $p = new Paragraph($this);
        $p->content = $todoRow->todo;

        return parent::getContent();

    }

}