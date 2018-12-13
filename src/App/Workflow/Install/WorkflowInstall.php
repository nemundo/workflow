<?php

namespace Nemundo\Workflow\App\Workflow\Install;


use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Workflow\Data\WorkflowCollection;

class WorkflowInstall extends AbstractScript
{


    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new WorkflowCollection());


    }

}