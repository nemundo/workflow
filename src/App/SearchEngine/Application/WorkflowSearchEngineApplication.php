<?php

namespace Nemundo\Workflow\App\SearchEngine\Application;


use Nemundo\App\Application\Type\AbstractApplication;

class WorkflowSearchEngineApplication extends AbstractApplication
{

    protected function loadApplication()
    {

        $this->application = 'Workflow Search Engine';
        $this->applicationId = 'b6118004-a674-4bdc-99e5-c5aac62bc898';

    }

}