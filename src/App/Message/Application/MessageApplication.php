<?php

namespace Nemundo\Workflow\App\Message\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Workflow\App\Message\Data\MessageCollection;

class MessageApplication extends AbstractApplication
{

    protected function loadApplication()
    {
        $this->application = 'Message';
        $this->applicationId = '2637a417-f706-4cda-8e16-748174c53cd9';
        $this->modelCollectionClass = MessageCollection::class;
    }

}