<?php

namespace Nemundo\Workflow\App\Task\WorkflowStatus;


use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\CommentTemplateWorkflowStatus;

class TaskChancelTemplateWorkflowStatus extends CommentTemplateWorkflowStatus
{

    // nur Ersteller kann task chancel???

    protected function loadData()
    {
        parent::loadData();

        $this->objectName = 'Task abbrechen';
        $this->objectId = 'e0679af6-b663-4430-a559-bfdfb6e67fc6';
        $this->closingWorkflow = true;


    }

}