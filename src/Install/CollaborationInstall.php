<?php

namespace Nemundo\Workflow\Install;


use Nemundo\App\Content\Install\ContentInstall;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\User\Setup\UsergroupSetup;
use Nemundo\Workflow\App\Assignment\Install\AssignmentInstall;
use Nemundo\Workflow\App\Calendar\Install\CalendarInstall;
use Nemundo\Workflow\App\ContentTemplate\Install\ContentTemplateInstall;
use Nemundo\Workflow\App\Dashboard\Install\DashboardInstall;
use Nemundo\Workflow\App\Favorite\Install\FavoriteInstall;
use Nemundo\Workflow\App\Identification\Install\IdentificationInstall;
use Nemundo\Workflow\App\Inbox\Install\InboxInstall;
use Nemundo\Workflow\App\Message\Install\MessageInstall;
use Nemundo\Workflow\App\News\Install\NewsInstall;
use Nemundo\Workflow\App\Notification\Install\NotificationInstall;
use Nemundo\Workflow\App\PersonalCalendar\Install\PersonalCalendarInstall;
use Nemundo\Workflow\App\PersonalTask\Install\PersonalTaskInstall;
use Nemundo\Workflow\App\RepeatingTask\Install\RepeatingTaskInstall;
use Nemundo\Workflow\App\SearchEngine\Install\SearchEngineInstall;
use Nemundo\Workflow\App\Stream\Install\StreamInstall;
use Nemundo\Workflow\App\Subscription\Install\SubscriptionInstall;
use Nemundo\Workflow\App\Survey\Install\SurveyInstall;
use Nemundo\Workflow\App\Task\Install\TaskInstall;
use Nemundo\Workflow\App\ToDo\Install\ToDoInstall;
use Nemundo\Workflow\App\Widget\Install\WidgetInstall;
use Nemundo\Workflow\App\Wiki\Install\WikiInstall;
use Nemundo\Workflow\App\Workflow\Install\WorkflowInstall;
use Nemundo\Workflow\App\WorkflowTemplate\Install\WorkflowTemplateInstall;
use Nemundo\Workflow\Usergroup\CollaborationUsergroup;

class CollaborationInstall extends AbstractScript
{

    public function run()
    {

        (new ContentInstall())->run();


        //(new WorkflowInstall())->run();
        (new WorkflowTemplateInstall())->run();
        //(new CalendarInstall())->run();
        (new InboxInstall())->run();
        //(new TaskInstall())->run();
        (new WikiInstall())->run();
        (new MessageInstall())->run();
        (new IdentificationInstall())->run();
        (new AssignmentInstall())->run();
        (new NewsInstall())->run();

        (new WidgetInstall())->run();
        (new DashboardInstall())->run();

        (new NotificationInstall())->run();

        //(new PersonalTaskInstall())->run();
        (new RepeatingTaskInstall())->run();
        (new PersonalCalendarInstall())->run();
        (new SearchEngineInstall())->run();
        //(new WidgetInstall())->run();
        //(new ToDoInstall())->run();
        (new ContentTemplateInstall())->run();
        (new SubscriptionInstall())->run();
        (new FavoriteInstall())->run();

        //(new SurveyInstall())->run();
        (new StreamInstall())->run();

        $setup = new UsergroupSetup();
        $setup->addUsergroup(new CollaborationUsergroup());


    }


}