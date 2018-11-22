<?php

namespace Nemundo\Workflow\App\Cms\Application;


use Nemundo\App\Application\Type\AbstractApplication;

class CmsApplication extends AbstractApplication
{

    protected function loadApplication()
    {
        $this->application = 'Cms';
        $this->applicationId = '1c45640f-cd59-4af4-9324-a76d91489884';
    }

}