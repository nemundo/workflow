<?php

namespace Nemundo\Workflow\Action;


use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\Workflow\Data\UserAssignment\UserAssignment;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentDelete;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignment;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignmentDelete;

class AssignmentWorkflowAction extends AbstractWorkflowAction
{


    public function assignUser($userId)
    {

        $data = new UserAssignment();
        $data->ignoreIfExists = true;
        $data->workflowId = $this->changeEvent->workflowId;
        $data->userId = $userId;
        $data->save();

        return $this;

    }


    public function assignUsergroup(AbstractUsergroup $usergroup)
    {

        $data = new UsergroupAssignment();
        $data->ignoreIfExists = true;
        $data->workflowId = $this->changeEvent->workflowId;
        $data->usergroupId = $usergroup->usergroupId;
        $data->save();

        return $this;

    }


    public function clearUserAssignment()
    {

        $delete = new UserAssignmentDelete();
        $delete->filter->andEqual($delete->model->workflowId, $this->changeEvent->workflowId);
        $delete->delete();

        return $this;

    }


    public function clearUsergroupAssignment()
    {

        $delete = new UsergroupAssignmentDelete();
        $delete->filter->andEqual($delete->model->workflowId, $this->changeEvent->workflowId);
        $delete->delete();

        return $this;

    }


    public function clearUsergroupUserAssignment()
    {
        $this->clearUsergroupAssignment();
        $this->clearUserAssignment();

        return $this;

    }


}