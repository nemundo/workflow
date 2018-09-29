<?php

namespace Nemundo\Workflow\App\Task\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Task\Application\TaskApplication;
use Nemundo\Workflow\App\Task\Data\TaskCollection;
use Nemundo\Workflow\App\Task\Process\TaskProcess;
use Nemundo\Workflow\App\Task\Test\TaskTest;
use Nemundo\Workflow\App\Task\Widget\TaskWidget;
use Nemundo\Workflow\App\Task\WorkflowStatus\TaskChancelTemplateWorkflowStatus;
use Nemundo\Workflow\App\Task\WorkflowStatus\TaskCommentWorkflowStatus;
use Nemundo\Workflow\App\Task\WorkflowStatus\TaskDoneWorkflowStatus;
use Nemundo\Workflow\App\Task\WorkflowStatus\TaskErfassungWorkflowStatus;
use Nemundo\Workflow\App\Task\WorkflowStatus\TaskListWorkflowStatus;
use Nemundo\Workflow\App\Widget\Setup\WidgetSetup;
use Nemundo\Workflow\App\Workflow\Setup\ProcessSetup;

class TaskInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new TaskCollection());

        $setup = new WidgetSetup();
        $setup->addWidget(new TaskWidget());

        $setup = new ApplicationSetup();
        $setup->addApplication(new TaskApplication());

        $setup = new ProcessSetup();
        $setup->addProcess(new TaskProcess());

        $setup = new ContentTypeSetup();
        $setup->addContentType(new TaskErfassungWorkflowStatus());
        $setup->addContentType(new TaskCommentWorkflowStatus());
        $setup->addContentType(new TaskDoneWorkflowStatus());
        $setup->addContentType(new TaskListWorkflowStatus());
        $setup->addContentType(new TaskChancelTemplateWorkflowStatus());

        $setup = new ScriptSetup();
        $setup->addScript(new TaskTest());


    }
}