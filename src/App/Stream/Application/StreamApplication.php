<?php

namespace Nemundo\Workflow\App\Stream\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Workflow\App\Stream\Data\StreamCollection;

class StreamApplication extends AbstractApplication
{

    protected function loadApplication()
    {
        $this->application = 'Stream';
        $this->applicationId = '7781c281-cf9a-4cf8-959d-e9c4fd1aa16d';
        $this->modelCollectionClass = StreamCollection::class;
    }

}