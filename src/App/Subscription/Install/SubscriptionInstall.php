<?php

namespace Nemundo\Workflow\App\Subscription\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Subscription\Application\SubscriptionApplication;
use Nemundo\Workflow\App\Subscription\Data\SubscriptionCollection;

class SubscriptionInstall extends AbstractScript
{

    public function run()
    {

        $setup= new ApplicationSetup();
        $setup->addApplication(new SubscriptionApplication());

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new SubscriptionCollection());

    }
}