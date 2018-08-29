<?php

namespace Nemundo\Workflow\App\ToDo\Notification;


use Nemundo\Workflow\App\Notification\Type\AbstractNotificationType;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoReader;
use Nemundo\Workflow\App\ToDo\Parameter\ToDoParameter;
use Nemundo\Workflow\App\ToDo\Site\ToDoItemSite;

class ToDoNotificationType extends AbstractNotificationType
{

    protected function loadData()
    {

        $this->name = 'ToDo';
        $this->id = '617a22d3-a2a7-4c57-b97b-dac0baf4d918';

        $this->itemSite = ToDoItemSite::$site;
        $this->parameterClass = ToDoParameter::class;

    }


    public function getNotificationText($dataId)
    {

        $row = (new ToDoReader())->getRowById($dataId);
        return $row->todo;

    }


}