<?php

namespace Nemundo\Workflow\App\Cms\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\User\Setup\UsergroupSetup;
use Nemundo\Workflow\App\Cms\Application\CmsApplication;
use Nemundo\Workflow\App\Cms\Usergroup\CmsEditorUsergroup;

class CmsInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ApplicationSetup();
        $setup->addApplication(new CmsApplication());

        $setup = new UsergroupSetup();
        $setup->application = new CmsApplication();
        $setup->addUsergroup(new CmsEditorUsergroup());


    }
}