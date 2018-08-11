<?php

namespace Nemundo\Workflow\App\Task\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Task\Application\TaskApplication;
use Nemundo\Workflow\App\Task\Data\TaskCollection;
use Nemundo\Workflow\App\Task\Widget\TaskWidget;
use Nemundo\Workflow\App\Widget\Setup\WidgetSetup;

class TaskInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new TaskCollection());

        $setup = new WidgetSetup();
        $setup->addWidget(new TaskWidget());

        $setup = new ApplicationSetup();
        $setup->addApplication(new TaskApplication());

    }
}