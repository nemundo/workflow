<?php

namespace Nemundo\Workflow\App\Assignment\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Workflow\App\Assignment\Data\AssignmentCollection;

class AssignmentApplication extends AbstractApplication
{

    protected function loadApplication()
    {
        $this->application = 'Assignment';
        $this->applicationId = '6669c13b-30a7-4d9e-9539-c87459b2975b';
        $this->modelCollectionClass = AssignmentCollection::class;
    }

}