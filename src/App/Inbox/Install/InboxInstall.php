<?php

namespace Nemundo\Workflow\App\Inbox\Install;

use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Inbox\Data\InboxCollection;
use Nemundo\Workflow\App\Inbox\Widget\InboxWidget;
use Nemundo\Workflow\App\Widget\Setup\WidgetSetup;

class InboxInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new InboxCollection());

        $setup = new WidgetSetup();
        $setup->addWidget(new InboxWidget());

    }
}