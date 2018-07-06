<?php

namespace Nemundo\Workflow\App\PersonalTask\Install;

use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendarCollection;
use Nemundo\Workflow\App\PersonalTask\Data\PersonalTaskCollection;
use Nemundo\Workflow\App\PersonalTask\Process\PersonalTaskProcess;
use Nemundo\Workflow\App\PersonalTask\WorkflowStatus\CommentTaskWorkflowStatus;
use Nemundo\Workflow\App\PersonalTask\WorkflowStatus\PersonalTaskErfassungWorkflowStatus;
use Nemundo\Workflow\App\PersonalTask\WorkflowStatus\PersonalTaskDoneWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Setup\ProcessSetup;
use Nemundo\Workflow\App\Workflow\Setup\WorkflowStatusSetup;

class PersonalTaskInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new PersonalTaskCollection());

        $setup = new ProcessSetup();
        $setup->addProcess(new PersonalTaskProcess());

        $setup = new WorkflowStatusSetup();
        $setup->addWorkflowStatus(new PersonalTaskErfassungWorkflowStatus());
        $setup->addWorkflowStatus(new PersonalTaskDoneWorkflowStatus());
        $setup->addWorkflowStatus(new CommentTaskWorkflowStatus());


    }
}