<?php

namespace Nemundo\Workflow\Install;


use Nemundo\App\Content\Install\ContentInstall;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\User\Setup\UsergroupSetup;
use Nemundo\Workflow\App\Assignment\Install\AssignmentInstall;
use Nemundo\Workflow\App\ContentTemplate\Install\ContentTemplateInstall;
use Nemundo\Workflow\App\Dashboard\Install\DashboardInstall;
use Nemundo\Workflow\App\Favorite\Install\FavoriteInstall;
use Nemundo\Workflow\App\Identification\Install\IdentificationInstall;
use Nemundo\Workflow\App\News\Install\NewsInstall;
use Nemundo\Workflow\App\Notification\Install\NotificationInstall;
use Nemundo\Workflow\App\SearchEngine\Install\SearchEngineInstall;
use Nemundo\Workflow\App\Stream\Install\StreamInstall;
use Nemundo\Workflow\App\Subscription\Install\SubscriptionInstall;
use Nemundo\Workflow\App\ToDo\Install\ToDoInstall;
use Nemundo\Workflow\App\UserConfig\Install\UserConfigInstall;
use Nemundo\Workflow\App\Workflow\Install\WorkflowInstall;
use Nemundo\Workflow\App\WorkflowTemplate\Install\WorkflowTemplateInstall;
use Nemundo\Workflow\Usergroup\CollaborationUsergroup;

class CollaborationInstall extends AbstractScript
{

    public function run()
    {

        (new ContentInstall())->run();
        (new WorkflowInstall())->run();
        (new WorkflowTemplateInstall())->run();
        (new IdentificationInstall())->run();
        (new AssignmentInstall())->run();
        (new NewsInstall())->run();
        (new DashboardInstall())->run();
        (new NotificationInstall())->run();
        (new SearchEngineInstall())->run();
        (new ToDoInstall())->run();
        (new ContentTemplateInstall())->run();
        (new SubscriptionInstall())->run();
        (new FavoriteInstall())->run();
        (new StreamInstall())->run();
        (new UserConfigInstall())->run();

        $setup = new UsergroupSetup();
        $setup->addUsergroup(new CollaborationUsergroup());

    }

}