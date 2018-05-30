<?php

namespace Nemundo\Workflow\Usergroup;


use Nemundo\User\Usergroup\AbstractUsergroup;

class WorkflowUsergroup extends AbstractUsergroup
{

    protected function loadUsergroup()
    {
        $this->usergroup = 'Workflow';
        $this->usergroupId = '57ddfc4d-f7b2-4c18-a9bd-298149823341';
    }

}