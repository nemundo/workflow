<?php

namespace Nemundo\Workflow\App\Notification\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Workflow\App\Notification\Data\NotificationCollection;

class NotificationApplication extends AbstractApplication
{

    protected function loadApplication()
    {
        $this->application = 'Notification';
        $this->applicationId = 'a462b2c5-c456-422a-aa36-c62d19ec4f0b';
        $this->modelCollectionClass = NotificationCollection::class;
    }

}