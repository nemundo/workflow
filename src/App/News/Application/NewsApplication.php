<?php

namespace Nemundo\Workflow\App\News\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Workflow\App\News\Data\NewsCollection;

class NewsApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'News';
        $this->applicationId = 'ab618c22-5264-4602-98b6-63dfc7561e46';
        $this->modelCollectionClass = NewsCollection::class;
    }

}