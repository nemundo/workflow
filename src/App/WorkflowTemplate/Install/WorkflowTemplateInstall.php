<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Install;

use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowTemplateCollection;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\ApprovalWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\ClosingWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\CommentTemplateWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\DeadlineChangeWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\DisapprovalWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\LargeTextWorkflowStatusTemplate;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\SendInboxWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\SubjectChangeWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\UserAssignmentChangeWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\UserDeadlineAssignmentWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\WorkflowAbortWorkflowStatus;

class WorkflowTemplateInstall extends AbstractScript
{

    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new WorkflowTemplateCollection());

        $setup = new ContentTypeSetup();
        $setup->addContentType(new UserAssignmentChangeWorkflowStatus());
        $setup->addContentType(new DeadlineChangeWorkflowStatus());
        $setup->addContentType(new ClosingWorkflowStatus());
        $setup->addContentType(new SubjectChangeWorkflowStatus());
        $setup->addContentType(new CommentTemplateWorkflowStatus());
        $setup->addContentType(new UserDeadlineAssignmentWorkflowStatus());
        $setup->addContentType(new LargeTextWorkflowStatusTemplate());
        $setup->addContentType(new WorkflowAbortWorkflowStatus());
        $setup->addContentType(new ApprovalWorkflowStatus());
        $setup->addContentType(new DisapprovalWorkflowStatus());
        $setup->addContentType(new SendInboxWorkflowStatus());

    }

}