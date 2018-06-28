<?php

namespace Nemundo\Workflow\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\User\Setup\UsergroupSetup;
use Nemundo\Workflow\App\SearchEngine\Data\SearchEngineCollection;
use Nemundo\Workflow\App\SearchEngine\Install\SearchEngineInstall;
use Nemundo\Workflow\App\Stream\Data\StreamCollection;
use Nemundo\Workflow\App\TeamInbox\Data\TeamInboxCollection;
use Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowTemplateCollection;
use Nemundo\Workflow\Application\WorkflowApplication;
use Nemundo\Workflow\Content\Data\ContentCollection;
use Nemundo\Workflow\Data\WorkflowCollection;
use Nemundo\Workflow\Script\WorkflowClean;
use Nemundo\Workflow\Setup\WorkflowStatusSetup;
use Nemundo\Workflow\Template\WorkflowStatus\ApprovalWorkflowStatus;
use Nemundo\Workflow\Template\WorkflowStatus\ClosingWorkflowStatus;
use Nemundo\Workflow\Template\WorkflowStatus\CommentWorkflowStatus;
use Nemundo\Workflow\Template\WorkflowStatus\DeadlineChangeWorkflowStatus;
use Nemundo\Workflow\Template\WorkflowStatus\DisapprovalWorkflowStatus;
use Nemundo\Workflow\Template\WorkflowStatus\SubjectChangeWorkflowStatus;
use Nemundo\Workflow\Template\WorkflowStatus\UserAssignmentChangeWorkflowStatus;
use Nemundo\Workflow\Usergroup\WorkflowAdministratorUsergroup;
use Nemundo\Workflow\Usergroup\WorkflowUsergroup;

class WorkflowInstall extends AbstractScript
{

    public function run()
    {

        $setup = new ApplicationSetup();
        $setup->addApplication(new WorkflowApplication());

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new WorkflowCollection());
        $setup->addCollection(new WorkflowTemplateCollection());
        $setup->addCollection(new SearchEngineCollection());
        $setup->addCollection(new TeamInboxCollection());
        $setup->addCollection(new ContentCollection());
        $setup->addCollection(new StreamCollection());

        $setup = new WorkflowStatusSetup();
        $setup->addWorkflowStatus(new ApprovalWorkflowStatus());
        $setup->addWorkflowStatus(new DisapprovalWorkflowStatus());
        $setup->addWorkflowStatus(new DeadlineChangeWorkflowStatus());
        $setup->addWorkflowStatus(new SubjectChangeWorkflowStatus());
        $setup->addWorkflowStatus(new UserAssignmentChangeWorkflowStatus());
        $setup->addWorkflowStatus(new CommentWorkflowStatus());
        $setup->addWorkflowStatus(new ClosingWorkflowStatus());

        $setup = new UsergroupSetup();
        $setup->application = new WorkflowApplication();
        $setup->addUsergroup(new WorkflowUsergroup());
        $setup->addUsergroup(new WorkflowAdministratorUsergroup());

        $setup = new ScriptSetup();
        $setup->application = new WorkflowApplication();
        $setup->addScript(new WorkflowClean());

        (new SearchEngineInstall())->run();


    }

}