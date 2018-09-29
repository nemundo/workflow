<?php

namespace Nemundo\Workflow\App\Inbox\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Workflow\App\Inbox\Data\InboxCollection;

class InboxApplication extends AbstractApplication
{

    protected function loadApplication()
    {
   $this->application = 'Inbox';
   $this->applicationId='a66963c6-7d13-41ba-a049-1681f531272a';
   $this->modelCollectionClass = InboxCollection::class;
    }

}