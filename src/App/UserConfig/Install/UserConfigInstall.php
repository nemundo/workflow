<?php

namespace Nemundo\Workflow\App\UserConfig\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\UserConfig\Application\UserConfigApplication;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigCollection;

class UserConfigInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ApplicationSetup();
        $setup->addApplication(new UserConfigApplication());

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new UserConfigCollection());

    }
}