<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Install;

use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowTemplateCollection;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\ClosingWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\CommentTemplateWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\DeadlineChangeWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\LargeTextWorkflowStatusTemplate;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\SubjectChangeWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\UserAssignmentChangeWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\UserDeadlineAssignmentWorkflowStatus;

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


    }
}