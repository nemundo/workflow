<?php

namespace Nemundo\Workflow\Action;


use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\Workflow\Data\UserAssignment\UserAssignment;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignment;

class UsergroupAssignmentAction extends AbstractWorkflowAction
{

    public function assignUsergroup(AbstractUsergroup $usergroup)
    {

        $data = new UsergroupAssignment();
        $data->ignoreIfExists = true;
        $data->workflowId = $this->workflowId;
        $data->usergroupId = $usergroup->usergroupId;
        $data->save();

    }

}