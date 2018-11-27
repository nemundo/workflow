<?php

namespace Nemundo\Workflow\App\Message\Usergroup;

use Nemundo\User\Usergroup\AbstractUsergroup;

class MessageUsergroup extends AbstractUsergroup
{
    protected function loadUsergroup()
    {
        $this->usergroup = 'Message';
        $this->usergroupId = 'a80dc391-742f-41f5-8e19-de6080aa65bd';
    }
}