<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Type;


use Nemundo\Workflow\App\Assignment\Builder\AssignmentBuilder;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractStatusChangeWorkflowStaus;


class ClosingWorkflowTemplateStatus extends AbstractStatusChangeWorkflowStaus
{

    protected function loadType()
    {

        $this->contentId = 'd868b46c-6be6-4e3f-a3fa-cfd989397630';
        $this->contentLabel = 'Workflow Close';
        $this->subject = 'Workflow was closed';
        $this->closingWorkflow = true;

    }


    public function saveType()
    {

        $this->saveContentLog();

        if ($this->parentContentType !== null) {
            (new AssignmentBuilder($this->parentContentType))->archiveAssignment();
        }

    }

}