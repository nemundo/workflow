<?php

namespace Nemundo\Workflow\App\Stream\Install;

use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Stream\Data\StreamCollection;
use Nemundo\Workflow\App\Stream\Script\StreamDeleteScript;

class StreamInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new StreamCollection());

        $setup = new ScriptSetup();
        $setup->addScript(new StreamDeleteScript());


    }
}