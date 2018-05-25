<?php

namespace Nemundo\Workflow\Install;

use Nemundo\Dev\Application\Setup\ApplicationSetup;
use Nemundo\Dev\Script\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\Application\WorkflowApplication;
use Nemundo\Workflow\Data\WorkflowCollection;

class WorkflowInstall extends AbstractScript
{

    public function run()
    {

        $setup = new ApplicationSetup();
        $setup->addApplication(new WorkflowApplication());

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new WorkflowCollection());

    }
}