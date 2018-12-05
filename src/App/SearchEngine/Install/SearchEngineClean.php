<?php

namespace Nemundo\Workflow\App\SearchEngine\Install;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\SearchEngine\Data\SearchEngineCollection;

class SearchEngineClean extends AbstractConsoleScript
{


    protected function loadScript()
    {
        $this->scriptName = 'search-engine-clean';
    }


    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->removeCollection(new SearchEngineCollection());

        (new SearchEngineInstall())->run();

    }
}