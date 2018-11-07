<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Install;

use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\WorkflowTemplate\Content\Type\AbortTemplateWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\Content\Type\ClosingWorkflowTemplateWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\Content\Type\CommentTemplateWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\Content\Type\File\FileDeleteTemplateStatus;
use Nemundo\Workflow\App\WorkflowTemplate\Content\Type\FileTemplateStatus;
use Nemundo\Workflow\App\WorkflowTemplate\Content\Type\UserAssignmentTemplateWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowTemplateCollection;


class WorkflowTemplateInstall extends AbstractScript
{

    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new WorkflowTemplateCollection());

        $setup = new ContentTypeSetup();
        $setup->addContentType(new CommentTemplateWorkflowStatus());
        $setup->addContentType(new AbortTemplateWorkflowStatus());
        $setup->addContentType(new ClosingWorkflowTemplateWorkflowStatus());
        $setup->addContentType(new UserAssignmentTemplateWorkflowStatus());

        // File
        $setup->addContentType(new FileTemplateStatus());
        $setup->addContentType(new FileDeleteTemplateStatus());


        /*
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
        $setup->addContentType(new SendInboxWorkflowStatus());*/

    }

}