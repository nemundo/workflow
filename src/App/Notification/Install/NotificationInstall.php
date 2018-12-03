<?php

namespace Nemundo\Workflow\App\Notification\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Notification\Application\NotificationApplication;
use Nemundo\Workflow\App\Notification\Data\NotificationCollection;
use Nemundo\Workflow\App\UserConfig\Install\UserConfigInstall;

class NotificationInstall extends AbstractScript
{
    public function run()
    {

        (new UserConfigInstall())->run();

        $setup = new ApplicationSetup();
        $setup->addApplication(new NotificationApplication());

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new NotificationCollection());

        $setup = new ScriptSetup();
        $setup->addScript(new NotificationClean());


    }
}