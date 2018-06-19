<?php

namespace Nemundo\Workflow\App\SearchEngine\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Workflow\App\SearchEngine\Application\WorkflowSearchEngineApplication;

class SearchEngineInstall extends AbstractScript
{

    public function run()
    {

        $setup = new ApplicationSetup();
        $setup->addApplication(new WorkflowSearchEngineApplication());

    }
}