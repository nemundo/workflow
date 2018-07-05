<?php

namespace Nemundo\Workflow\App\Wiki\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Workflow\App\Wiki\Data\WikiCollection;

class WikiApplication extends AbstractApplication
{

    protected function loadApplication()
    {
        $this->application = 'Wiki';
        $this->applicationId = 'c1a566c0-6618-4184-9fcd-f55d4b031095';
        $this->modelCollectionClassName = WikiCollection::class;
    }

}