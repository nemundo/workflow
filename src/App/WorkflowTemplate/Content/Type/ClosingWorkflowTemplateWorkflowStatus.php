<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Type;


use Nemundo\App\Content\Type\Workflow\_AbstractChangeWorkflowStatus;
use Nemundo\Workflow\App\Assignment\Builder\AssignmentArchive;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractStatusChangeWorkflowStaus;


class ClosingWorkflowTemplateWorkflowStatus extends AbstractStatusChangeWorkflowStaus
{

    protected function loadType()
    {

        $this->contentId = 'd868b46c-6be6-4e3f-a3fa-cfd989397630';
        $this->contentName = 'Workflow Close';
        $this->subject = 'Workflow was closed';
        $this->closingWorkflow = true;

    }


    public function saveType()
    {

        $this->saveContentLog();

        if ($this->parentContentType !== null) {
            (new AssignmentArchive())->archiveAssignment($this->parentContentType->dataId);
        }

    }

}