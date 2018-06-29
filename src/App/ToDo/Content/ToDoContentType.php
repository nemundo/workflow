<?php

namespace Nemundo\Workflow\App\ToDo\Content;


use Nemundo\Workflow\App\ToDo\Site\ToDoItemSite;
use Nemundo\Workflow\Content\Type\AbstractContentType;

class ToDoContentType extends AbstractContentType
{

    protected function loadType()
    {
        $this->name = 'To Do';
        $this->id = 'c9c9f07f-7608-49be-99b4-95c1aa07c69b';
        $this->itemClass = ToDoContentItem::class;
        $this->itemSite = ToDoItemSite::$site;
    }

}