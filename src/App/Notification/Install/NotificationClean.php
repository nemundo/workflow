<?php

namespace Nemundo\Workflow\App\Notification\Install;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Notification\Data\NotificationCollection;

class NotificationClean extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'notification-clean';
    }

    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->removeCollection(new NotificationCollection());

        (new NotificationInstall())->run();

    }


}