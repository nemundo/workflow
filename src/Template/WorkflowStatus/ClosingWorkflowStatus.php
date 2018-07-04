<?php

namespace Nemundo\Workflow\Template\WorkflowStatus;


use Nemundo\Workflow\Action\AssignmentWorkflowAction;
use Nemundo\Workflow\App\WorkflowTemplate\Data\Comment\CommentModel;
use Nemundo\Workflow\Builder\StatusChangeEvent;
use Nemundo\Workflow\WorkflowStatus\AbstractDataWorkflowStatus;

class ClosingWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadData()
    {

        //$this->workflowStatus = 'Close Workflow';
        //$this->workflowStatusText = 'Workflow was closed';
        $this->name = 'Workflow abschliessen';
        $this->workflowStatusText = 'Workflow wurde abgeschlossen';

        $this->id = '0f5475a0-70a5-420e-957a-e6714fe5b85e';
        $this->modelClass = CommentModel::class;
        $this->closingWorkflow = true;

    }


    public function onChange(StatusChangeEvent $changeEvent)
    {

        (new AssignmentWorkflowAction($changeEvent))
            ->clearUsergroupUserAssignment();

    }

}