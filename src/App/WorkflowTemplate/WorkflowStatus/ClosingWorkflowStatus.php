<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus;


use Nemundo\Workflow\App\WorkflowTemplate\Data\Comment\CommentModel;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;

class ClosingWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadData()
    {

        //$this->workflowStatus = 'Close Workflow';
        //$this->workflowStatusText = 'Workflow was closed';
        $this->name = 'Workflow abschliessen';
        //$this->workflowStatusText = 'Workflow wurde abgeschlossen';
        $this->id = '0f5475a0-70a5-420e-957a-e6714fe5b85e';
        $this->modelClass = CommentModel::class;
        $this->closingWorkflow = true;

    }


    public function onCreate($dataId)
    {

        $this->clearAssignment();
        $this->archiveTask();
        $this->closeWorkflow();

    }

}