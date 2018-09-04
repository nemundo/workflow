<?php

namespace Nemundo\Workflow\App\Assignment\Install;

use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Assignment\Data\AssignmentCollection;

class AssignmentInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new AssignmentCollection());


    }
}