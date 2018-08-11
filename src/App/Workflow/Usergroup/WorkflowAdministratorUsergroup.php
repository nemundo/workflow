<?php

namespace Nemundo\Workflow\App\Workflow\Usergroup;


use Nemundo\User\Usergroup\AbstractUsergroup;

class WorkflowAdministratorUsergroup extends AbstractUsergroup
{

    protected function loadData()
    {
        $this->name = 'Workflow Administrator';
        $this->id = 'e473646b-fae1-4def-b24b-8d95dd297967';
    }

}