<?php

namespace Nemundo\Workflow\App\Notification\Install;

use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Notification\Data\NotificationCollection;

class NotificationInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new NotificationCollection());

    }
}