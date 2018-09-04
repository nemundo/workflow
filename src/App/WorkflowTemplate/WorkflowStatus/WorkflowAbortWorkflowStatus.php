<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus;


use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowAbort\WorkflowAbortModel;

class WorkflowAbortWorkflowStatus extends AbstractDataWorkflowStatus
{


    protected function loadData()
    {
        $this->id = '0e49408b-e3cd-4850-888f-65c53415c043';
        $this->name = 'Workflow Abbrechen (Abbruch)';
        $this->modelClass = WorkflowAbortModel::class;
        $this->closingWorkflow = true;
    }


    public function onCreate($dataId)
    {
        $this->clearAssignment();
    }

}