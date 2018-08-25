<?php

namespace Nemundo\Workflow\App\PersonalTask\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Workflow\App\PersonalTask\Data\PersonalTaskCollection;

class PersonalTaskApplication extends AbstractApplication
{

    protected function loadApplication()
    {
        $this->application = 'Personal Task';
        $this->applicationId = 'c3d31f3c-bc75-472a-91fb-3902c2aa3c60';
        $this->modelCollectionClass = PersonalTaskCollection::class;
    }

}