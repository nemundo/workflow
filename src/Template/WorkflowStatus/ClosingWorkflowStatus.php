<?php

namespace Nemundo\Workflow\Template\WorkflowStatus;


use Nemundo\Workflow\App\WorkflowTemplate\Data\Comment\CommentModel;
use Nemundo\Workflow\WorkflowStatus\AbstractDataWorkflowStatus;

class ClosingWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadWorkflowStatus()
    {

        $this->workflowStatus = 'Close Workflow';
        $this->workflowStatusText = 'Workflow was closed';
        $this->workflowStatusId = '0f5475a0-70a5-420e-957a-e6714fe5b85e';
        $this->modelClassName = CommentModel::class;
        $this->closingWorkflow = true;

    }

}