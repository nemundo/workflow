<?php

namespace Nemundo\Workflow\App\Inbox\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Inbox\Application\InboxApplication;
use Nemundo\Workflow\App\Inbox\Data\InboxCollection;
use Nemundo\Workflow\App\MailConfig\Install\MailConfigInstall;


class InboxInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new InboxCollection());

        $setup = new ApplicationSetup();
        $setup->addApplication(new InboxApplication());

        (new MailConfigInstall())->run();

    }

}