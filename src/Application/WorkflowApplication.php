<?php

namespace Nemundo\Workflow\Application;


use Nemundo\Dev\Application\Type\AbstractApplication;
use Nemundo\Workflow\Data\WorkflowCollection;

class WorkflowApplication extends AbstractApplication
{

    protected function loadApplication()
    {

        $this->application = 'Workflow';
        $this->applicationId = '174d37fe-656d-4cf8-90b9-f71c60fe5cc1';
        $this->modelCollectionClassName = WorkflowCollection::class;

    }

}