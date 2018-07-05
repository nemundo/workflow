<?php

namespace Nemundo\Workflow\Template\WorkflowStatus;


use Nemundo\Workflow\Action\AssignmentWorkflowAction;
use Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange\UserAssignmentChangeModel;
use Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange\UserAssignmentChangeReader;
use Nemundo\Workflow\App\Workflow\Builder\StatusChangeEvent;
use Nemundo\Workflow\WorkflowStatus\AbstractDataWorkflowStatus;


class UserAssignmentChangeWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadData()
    {

        $this->name = 'User Assignment';
        $this->id = '24a41cf4-4ccd-43f1-baa5-40ae79e040fa';
        $this->changeWorkflowStatus = false;
        $this->modelClass = UserAssignmentChangeModel::class;

    }



    public function onChange(StatusChangeEvent $changeEvent)
    {

        $row = (new UserAssignmentChangeReader())->getRowById($changeEvent->workflowItemId);

        (new AssignmentWorkflowAction($changeEvent))
            ->clearUsergroupUserAssignment()
            ->assignUser($row->userId);

    }

}