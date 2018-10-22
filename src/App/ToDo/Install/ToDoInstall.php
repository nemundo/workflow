<?php

namespace Nemundo\Workflow\App\ToDo\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Assignment\Setup\AssignmentFilterSetup;
use Nemundo\Workflow\App\ToDo\Application\ToDoApplication;
use Nemundo\Workflow\App\ToDo\Content\Type\Process\ToDoProcess;
use Nemundo\Workflow\App\ToDo\Content\Type\Status\ToDoDoneStatus;
use Nemundo\Workflow\App\ToDo\Content\Type\Status\ToDoErfassungStatus;
use Nemundo\Workflow\App\ToDo\Data\ToDoCollection;
use Nemundo\App\Content\Setup\ContentTypeSetup;

class ToDoInstall extends AbstractScript
{

    public function run()
    {

        $setup = new ApplicationSetup();
        $setup->addApplication(new ToDoApplication());

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new ToDoCollection());

        $setup = new ContentTypeSetup();
        $setup->addContentType(new ToDoProcess());
        $setup->addContentType(new ToDoErfassungStatus());
        $setup->addContentType(new ToDoDoneStatus());

        $setup = new AssignmentFilterSetup();
        $setup->addContentType(new ToDoProcess());

    }

}