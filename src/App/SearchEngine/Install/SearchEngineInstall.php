<?php

namespace Nemundo\Workflow\App\SearchEngine\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\SearchEngine\Application\WorkflowSearchEngineApplication;
use Nemundo\Workflow\App\SearchEngine\Data\SearchEngineCollection;
use Nemundo\Workflow\App\SearchEngine\Widget\SearchEngineWidget;
use Nemundo\Workflow\App\Widget\Setup\WidgetSetup;

class SearchEngineInstall extends AbstractScript
{

    public function run()
    {

        $setup = new ApplicationSetup();
        $setup->addApplication(new WorkflowSearchEngineApplication());

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new SearchEngineCollection());

        $setup = new WidgetSetup();
        $setup->addWidget(new SearchEngineWidget());


    }
}