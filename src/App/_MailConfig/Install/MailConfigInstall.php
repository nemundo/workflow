<?php

namespace Nemundo\Workflow\App\MailConfig\Install;

use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\MailConfig\Data\MailConfigCollection;

class MailConfigInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new MailConfigCollection());

    }
}