<?php

namespace Nemundo\Workflow\App\SearchEngine\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Workflow\App\SearchEngine\Data\SearchEngineCollection;

class WorkflowSearchEngineApplication extends AbstractApplication
{

    protected function loadApplication()
    {

        $this->application = 'Search Engine';
        $this->applicationId = 'b6118004-a674-4bdc-99e5-c5aac62bc898';
        $this->modelCollectionClass = SearchEngineCollection::class;

    }

}