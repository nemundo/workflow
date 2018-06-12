<?php

namespace Nemundo\Workflow\Action;


use Nemundo\Workflow\Data\UserAssignment\UserAssignment;

class UserAssignmentAction extends AbstractWorkflowAction
{

    public function assignUser($userId) {

        $data = new UserAssignment();
        $data->ignoreIfExists = true;
        $data->workflowId = $this->workflowId;
        $data->userId = $userId;
        $data->save();

    }

}