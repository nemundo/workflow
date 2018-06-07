<?php

namespace Nemundo\Workflow\Install;

use Nemundo\Dev\Application\Setup\ApplicationSetup;
use Nemundo\Dev\Script\AbstractScript;
use Nemundo\Dev\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\User\Setup\UsergroupSetup;
use Nemundo\Workflow\Application\WorkflowApplication;
use Nemundo\Workflow\Data\WorkflowCollection;
use Nemundo\Workflow\Script\WorkflowClean;
use Nemundo\Workflow\Setup\WorkflowStatusSetup;
use Nemundo\Workflow\Template\WorkflowStatus\ApprovalWorkflowStatus;
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

        $setup = new WorkflowStatusSetup();
        $setup->addWorkflowStatus(new ApprovalWorkflowStatus());
        $setup->addWorkflowStatus(new DisapprovalWorkflowStatus());
        $setup->addWorkflowStatus(new DeadlineChangeWorkflowStatus());
        $setup->addWorkflowStatus(new SubjectChangeWorkflowStatus());
        $setup->addWorkflowStatus(new UserAssignmentChangeWorkflowStatus());
        $setup->addWorkflowStatus(new CommentWorkflowStatus());

        $setup = new UsergroupSetup();
        $setup->addUsergroup(new WorkflowUsergroup());
        $setup->addUsergroup(new WorkflowAdministratorUsergroup());

        $setup = new ScriptSetup();
        $setup->addScript(new WorkflowClean());

    }

}