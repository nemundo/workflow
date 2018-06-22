<?php

namespace Nemundo\Workflow\App\PasswordReset\WorkflowStatus;


use Nemundo\Workflow\WorkflowStatus\AbstractChangeWorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class PasswordChangeWorkflowStatus extends AbstractChangeWorkflowStatus
{

    protected function loadWorkflowStatus()
    {

        $this->workflowStatus = 'Password Change';
        $this->workflowStatusId = '4aceb6db-1fd8-41bb-8796-7ea8f8abdfde';



    }

}