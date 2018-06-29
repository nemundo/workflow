<?php

namespace Nemundo\Workflow\App\Widget\Install;

use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Widget\Data\WidgetCollection;

class WidgetInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new WidgetCollection());

    }
}