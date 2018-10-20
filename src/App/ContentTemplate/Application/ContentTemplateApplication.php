<?php

namespace Nemundo\Workflow\App\ContentTemplate\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateCollection;

class ContentTemplateApplication extends AbstractApplication
{

    protected function loadApplication()
    {
        $this->application = 'Content Template';
        $this->applicationId = '16412d75-45c7-42fc-9720-4a76b6aa7a9fl';
        $this->modelCollectionClass = ContentTemplateCollection::class;
    }

}