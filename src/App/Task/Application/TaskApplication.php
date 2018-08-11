<?php

namespace Nemundo\Workflow\App\Task\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Workflow\App\Task\Data\TaskCollection;

class TaskApplication extends AbstractApplication
{

    protected function loadApplication()
    {
        $this->application = 'Task';
        $this->applicationId = 'ec0f1609-5b00-4309-b304-a4f092dba1c2';
        $this->modelCollectionClass = TaskCollection::class;
    }

}