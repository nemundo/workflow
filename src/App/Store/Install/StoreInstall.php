<?php

namespace Nemundo\Workflow\App\Store\Install;

use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Store\Data\StoreCollection;

class StoreInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new StoreCollection());


    }
}