<?php

namespace Nemundo\Workflow\Usergroup;


use Nemundo\User\Usergroup\AbstractUsergroup;

class CollaborationUsergroup extends AbstractUsergroup
{

    protected function loadData()
    {
        $this->name = 'Collaboration User';
        $this->id = '57ddfc4d-f7b2-4c18-a9bd-298149823341';
    }

}