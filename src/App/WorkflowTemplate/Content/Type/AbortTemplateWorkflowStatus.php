<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Type;

use Nemundo\App\Content\Type\Workflow\AbstractChangeWorkflowStatus;
use Nemundo\App\Content\Type\Workflow\AbstractWorkflowStatus;
use Nemundo\Workflow\App\Assignment\Builder\AssignmentArchive;
use Nemundo\Workflow\App\WorkflowTemplate\Content\Form\AbortTemplateWorkflowForm;

class AbortTemplateWorkflowStatus extends AbstractWorkflowStatus  // AbstractChangeWorkflowStatus
{


    protected function loadData()
    {
        $this->contentId = '0e49408b-e3cd-4850-888f-65c53415c043';
        $this->contentName = 'Workflow Abbrechen (Abbruch)';
        //$this->modelClass = WorkflowAbortModel::class;
        $this->closingWorkflow = true;

        //$this->changeStatus = false;

        $this->formClass = AbortTemplateWorkflowForm::class;
    }


    public function saveType()
    {

        $this->saveContentLog();

        if ($this->parentContentType !== null) {
            (new AssignmentArchive())->archiveAssignment($this->parentContentType->dataId);
        }

    }

}