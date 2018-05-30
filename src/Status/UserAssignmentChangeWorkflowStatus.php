<?php

namespace Nemundo\Workflow\Status;


use Nemundo\Workflow\Data\UserAssignment\UserAssignment;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentDelete;
use Nemundo\Workflow\Data\UserAssignmentChange\UserAssignmentChangeModel;
use Nemundo\Workflow\Data\UserAssignmentChange\UserAssignmentChangeReader;

class UserAssignmentChangeWorkflowStatus extends AbstractWorkflowStatus
{

    protected function loadWorkflowStatus()
    {

        $this->status = 'User Assignment';
        $this->statusId = '24a41cf4-4ccd-43f1-baa5-40ae79e040fa';
        $this->changeWorkflowStatus = false;

        $this->modelClassName = UserAssignmentChangeModel::class;
        //$this->formClassName = SubjectChangeForm::class;
        //$this->workflowItemClassName = SubjectChangeItem::class;

    }


    protected function onChange($workflowId, $workflowItemId = null)
    {

        $row = (new UserAssignmentChangeReader())->getRowById($workflowItemId);

        $delete = new UserAssignmentDelete();
        $delete->filter->andEqual($delete->model->workflowId, $workflowId);
        $delete->delete();

        $data = new UserAssignment();
        $data->workflowId = $workflowId;
        $data->userId = $row->userId;
        $data->save();

    }

}