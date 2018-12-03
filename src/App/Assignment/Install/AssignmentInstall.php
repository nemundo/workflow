<?php

namespace Nemundo\Workflow\App\Assignment\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Assignment\Application\AssignmentApplication;
use Nemundo\Workflow\App\Assignment\Data\AssignmentCollection;
use Nemundo\Workflow\App\MailConfig\Install\MailConfigInstall;
use Nemundo\Workflow\App\UserConfig\Install\UserConfigInstall;

class AssignmentInstall extends AbstractScript
{
    public function run()
    {

        (new UserConfigInstall())->run();

        $setup = new ApplicationSetup();
        $setup->addApplication(new AssignmentApplication());

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new AssignmentCollection());

        $setup = new ScriptSetup();
        $setup->application = new AssignmentApplication();
        $setup->addScript(new AssignmentClean());

    }
}