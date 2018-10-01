<?php

namespace Nemundo\Workflow\App\Assignment\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Assignment\Application\AssignmentApplication;
use Nemundo\Workflow\App\Assignment\Data\AssignmentCollection;
use Nemundo\Workflow\App\MailConfig\Install\MailConfigInstall;

class AssignmentInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ApplicationSetup();
        $setup->addApplication(new AssignmentApplication());

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new AssignmentCollection());


        (new MailConfigInstall());

    }
}