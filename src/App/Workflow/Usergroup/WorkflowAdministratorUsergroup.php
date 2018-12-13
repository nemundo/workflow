<?php
namespace Nemundo\Workflow\App\Workflow\Usergroup;
use Nemundo\User\Usergroup\AbstractUsergroup;
class WorkflowAdministratorUsergroup extends AbstractUsergroup {
protected function loadUsergroup() {
$this->usergroup = 'WorkflowAdministrator';
$this->usergroupId = 'b57bcacb-65e3-4ef5-a81f-406bca384be5';
}
}