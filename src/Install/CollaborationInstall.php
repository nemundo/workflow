<?php

namespace Nemundo\Workflow\Install;


use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Workflow\App\Identification\Install\IdentificationInstall;
use Nemundo\Workflow\App\Inbox\Install\InboxInstall;
use Nemundo\Workflow\App\Message\Install\MessageInstall;
use Nemundo\Workflow\App\PersonalTask\Install\PersonalTaskInstall;
use Nemundo\Workflow\App\SearchEngine\Install\SearchEngineInstall;
use Nemundo\Workflow\App\Task\Install\TaskInstall;
use Nemundo\Workflow\App\Widget\Install\WidgetInstall;
use Nemundo\Workflow\App\Wiki\Install\WikiInstall;

class CollaborationInstall extends AbstractScript
{

    public function run()
    {

        (new \Nemundo\Workflow\App\Workflow\Install\WorkflowInstall())->run();
        (new InboxInstall())->run();
        (new TaskInstall())->run();
        (new WikiInstall())->run();
        (new MessageInstall())->run();
        (new IdentificationInstall())->run();
        (new WidgetInstall())->run();
        (new PersonalTaskInstall())->run();
        (new SearchEngineInstall())->run();

    }


}