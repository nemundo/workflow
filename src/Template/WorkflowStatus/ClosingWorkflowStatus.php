<?php

namespace Nemundo\Workflow\Template\WorkflowStatus;


use Nemundo\Workflow\WorkflowStatus\AbstractChangeWorkflowStatus;

class ClosingWorkflowStatus extends AbstractChangeWorkflowStatus
{

    protected function loadWorkflowStatus()
    {

        $this->workflowStatus = 'Close';
        $this->workflowStatusText = 'Workflow was closed';
        $this->workflowStatusId = '0f5475a0-70a5-420e-957a-e6714fe5b85e';
        $this->closingWorkflow = true;


    }

}