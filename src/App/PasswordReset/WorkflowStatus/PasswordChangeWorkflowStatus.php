<?php

namespace Nemundo\Workflow\App\PasswordReset\WorkflowStatus;


//use Nemundo\Workflow\App\Workflow\Content\Type\AbstractChangeWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractStatusChangeWorkflowStaus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;

class PasswordChangeWorkflowStatus extends AbstractChangeWorkflowStatus
{

    protected function loadData()
    {

        $this->contentName = 'Password Change';
        $this->contentId = '4aceb6db-1fd8-41bb-8796-7ea8f8abdfde';

    }

}