<?php

namespace Nemundo\Workflow\App\Workflow\Install;


use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\User\Setup\UsergroupSetup;
use Nemundo\Workflow\App\Workflow\Data\WorkflowCollection;
use Nemundo\Workflow\App\Workflow\Usergroup\WorkflowAdministratorUsergroup;

class WorkflowInstall extends AbstractScript
{


    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new WorkflowCollection());

        $setup=new UsergroupSetup();
        $setup->addUsergroup(new WorkflowAdministratorUsergroup());


    }

}