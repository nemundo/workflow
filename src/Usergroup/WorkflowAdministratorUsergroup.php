<?php

namespace Nemundo\Workflow\Usergroup;


use Nemundo\User\Usergroup\AbstractUsergroup;

class WorkflowAdministratorUsergroup extends AbstractUsergroup
{

    protected function loadUsergroup()
    {
        $this->usergroup = 'Workflow Administrator';
        $this->usergroupId = 'e473646b-fae1-4def-b24b-8d95dd297967';
    }

}