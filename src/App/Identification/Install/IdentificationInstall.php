<?php

namespace Nemundo\Workflow\App\Identification\Install;

use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Identification\Data\IdentificationCollection;
use Nemundo\Workflow\App\Identification\Setup\IdentificationSetup;
use Nemundo\Workflow\App\Identification\Type\UsergroupIdentificationType;
use Nemundo\Workflow\App\Identification\Type\UserIdentificationType;

class IdentificationInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new IdentificationCollection());

        $setup = new IdentificationSetup();
        $setup->addIdentification(new UserIdentificationType());
        $setup->addIdentification(new UsergroupIdentificationType());

    }
}