<?php

namespace Nemundo\Workflow\App\ToDo\Install;

use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Notification\Setup\NotificationSetup;
use Nemundo\Workflow\App\ToDo\Content\ToDoContentType;
use Nemundo\Workflow\App\ToDo\Data\ToDoCollection;
use Nemundo\Workflow\App\ToDo\Notification\ToDoNotificationType;
use Nemundo\Workflow\App\ToDo\Process\ToDoProcess;
use Nemundo\Workflow\App\ToDo\Status\ToDoErfassungWorkflowStatus;
use Nemundo\Workflow\App\ToDo\Widget\ToDoWidget;
use Nemundo\Workflow\App\Widget\Setup\WidgetSetup;
use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\Workflow\App\Workflow\Setup\ProcessSetup;

class ToDoInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new ToDoCollection());

        $setup = new ProcessSetup();
        $setup->addProcess(new ToDoProcess());

        $setup = new ContentTypeSetup();
        $setup->addContentType(new ToDoContentType());
        $setup->addContentType(new ToDoErfassungWorkflowStatus());

        //$setup = new WidgetSetup();
        //$setup->addWidget(new ToDoWidget());

        $setup = new NotificationSetup();
        $setup->addNotificationType(new ToDoNotificationType());


    }
}