<?php

namespace Nemundo\Workflow\App\Cms\Usergroup;

use Nemundo\User\Usergroup\AbstractUsergroup;

class CmsEditorUsergroup extends AbstractUsergroup
{
    protected function loadUsergroup()
    {
        $this->usergroup = 'Cms Editor';
        $this->usergroupId = 'd959d9fe-69d8-4b9f-a06e-46b711dab268';
    }
}