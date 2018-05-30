<?php

namespace Nemundo\Workflow\Install;

use Nemundo\Dev\Application\Setup\ApplicationSetup;
use Nemundo\Dev\Script\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\User\Setup\UsergroupSetup;
use Nemundo\Workflow\Application\WorkflowApplication;
use Nemundo\Workflow\Data\WorkflowCollection;
use Nemundo\Workflow\Setup\WorkflowStatusSetup;
use Nemundo\Workflow\Status\ApprovalWorkflowStatus;
use Nemundo\Workflow\Status\DeadlineChangeWorkflowStatus;
use Nemundo\Workflow\Status\DisapprovalWorkflowStatus;
use Nemundo\Workflow\Status\SubjectChangeWorkflowStatus;
use Nemundo\Workflow\Status\UserAssignmentChangeWorkflowStatus;
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

        $setup = new UsergroupSetup();
        $setup->addUsergroup(new WorkflowUsergroup());

    }
}