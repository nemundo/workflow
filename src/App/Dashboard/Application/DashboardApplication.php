<?php

namespace Nemundo\Workflow\App\Dashboard\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Workflow\App\Dashboard\Data\DashboardCollection;

class DashboardApplication extends AbstractApplication
{

    protected function loadApplication()
    {
        $this->application = 'Dashboard';
        $this->applicationId = 'a08b97b8-cccf-46b1-a6c9-1f6af136bbbe';
        $this->modelCollectionClass = DashboardCollection::class;
    }

}