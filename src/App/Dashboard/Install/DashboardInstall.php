<?php

namespace Nemundo\Workflow\App\Dashboard\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Dashboard\Application\DashboardApplication;
use Nemundo\Workflow\App\Dashboard\Data\DashboardCollection;

class DashboardInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new DashboardCollection());

        $setup = new ApplicationSetup();
        $setup->addApplication(new DashboardApplication());

    }
}