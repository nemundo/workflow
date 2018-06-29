<?php

namespace Nemundo\Workflow\App\ToDo\Install;

use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\ToDo\Content\ToDoContentType;
use Nemundo\Workflow\App\ToDo\Data\ToDoCollection;
use Nemundo\Workflow\App\ToDo\Widget\ToDoWidget;
use Nemundo\Workflow\App\Widget\Setup\WidgetSetup;
use Nemundo\Workflow\Content\Setup\ContentTypeSetup;

class ToDoInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new ToDoCollection());

        $setup = new ContentTypeSetup();
        $setup->addContentType(new ToDoContentType());

        $setup = new WidgetSetup();
        $setup->addWidget(new ToDoWidget());

    }
}