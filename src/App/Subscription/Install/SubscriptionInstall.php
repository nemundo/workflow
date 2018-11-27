<?php

namespace Nemundo\Workflow\App\Subscription\Install;

use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Subscription\Data\SubscriptionCollection;

class SubscriptionInstall extends AbstractScript
{

    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new SubscriptionCollection());

    }
}