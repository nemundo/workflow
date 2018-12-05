<?php

namespace Nemundo\Workflow\App\SearchEngine\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\SearchEngine\Application\SearchEngineApplication;
use Nemundo\Workflow\App\SearchEngine\Data\SearchEngineCollection;

class SearchEngineInstall extends AbstractScript
{

    public function run()
    {

        $setup = new ApplicationSetup();
        $setup->addApplication(new SearchEngineApplication());

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new SearchEngineCollection());

        $setup = new ScriptSetup();
        $setup->addScript(new SearchEngineClean());

    }
}