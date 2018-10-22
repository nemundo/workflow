<?php

namespace Nemundo\Workflow\App\ToDo\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Workflow\App\ToDo\Data\ToDoCollection;

class ToDoApplication extends AbstractApplication
{

    protected function loadApplication()
    {
        $this->application = 'To Do';
        $this->applicationId = 'b943463f-a453-4d94-b952-773bed0f1075';
        $this->modelCollectionClass = ToDoCollection::class;
    }

}