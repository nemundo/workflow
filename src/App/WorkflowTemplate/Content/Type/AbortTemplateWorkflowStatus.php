<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Type;

use Nemundo\App\Content\Type\Workflow\AbstractChangeWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractStatusChangeWorkflowStaus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\Assignment\Builder\AssignmentArchive;
use Nemundo\Workflow\App\WorkflowTemplate\Content\Form\AbortTemplateWorkflowForm;


// ChancelWorkflowTemplateWorkflowStatus
class AbortTemplateWorkflowStatus extends AbstractStatusChangeWorkflowStaus   // AbstractWorkflowStatus  // AbstractChangeWorkflowStatus
{


    protected function loadType()
    {
        $this->contentId = '0e49408b-e3cd-4850-888f-65c53415c043';
        $this->contentLabel = 'Workflow Abbrechen (Abbruch)';
        $this->contentName = 'worklow_abort';
        //$this->modelClass = WorkflowAbortModel::class;
        $this->subject = 'Workflow was chanceld';
        $this->closingWorkflow = true;

        //$this->changeStatus = false;

        //$this->formClass = AbortTemplateWorkflowForm::class;
    }


    public function saveType()
    {

        $this->saveContentLog();

        if ($this->parentContentType !== null) {
            (new AssignmentArchive())->archiveAssignment($this->parentContentType->dataId);
        }

    }

}