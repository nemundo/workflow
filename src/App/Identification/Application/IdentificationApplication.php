<?php

namespace Nemundo\Workflow\App\Identification\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Workflow\App\Identification\Data\IdentificationCollection;

class IdentificationApplication extends AbstractApplication
{

    protected function loadApplication()
    {
        $this->application = 'Identification';
        $this->applicationId = 'a814d5fa-bd5a-44e4-8253-0aabc07af7d3';
        $this->modelCollectionClass = IdentificationCollection::class;
    }

}