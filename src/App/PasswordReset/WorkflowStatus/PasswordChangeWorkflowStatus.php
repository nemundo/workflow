<?php

namespace Nemundo\Workflow\App\PasswordReset\WorkflowStatus;


use Nemundo\Workflow\WorkflowStatus\AbstractChangeWorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class PasswordChangeWorkflowStatus extends AbstractChangeWorkflowStatus
{

    protected function loadType()
    {

        $this->name = 'Password Change';
        $this->id = '4aceb6db-1fd8-41bb-8796-7ea8f8abdfde';



    }

}