<?php

namespace Nemundo\Workflow\App\UserConfig\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigCollection;

class UserConfigApplication extends AbstractApplication
{

    protected function loadApplication()
    {
        $this->application = 'User Config';
        $this->applicationId = '247d43d7-7d97-43a2-a56f-b42c0673a6ee';
        $this->modelCollectionClass = UserConfigCollection::class;
    }

}