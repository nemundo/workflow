<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus;


use Nemundo\Workflow\App\Workflow\Content\Type\AbstractModelDataWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\Data\UserDeadlineAssignment\UserDeadlineAssignmentModel;
use Nemundo\Workflow\App\WorkflowTemplate\Data\UserDeadlineAssignment\UserDeadlineAssignmentReader;

class UserDeadlineAssignmentWorkflowStatus extends AbstractModelDataWorkflowStatus
{


    protected function loadData()
    {
        $this->contentName = 'User Deadline Assignment Change';
        $this->contentId = 'd0e47cc1-c22f-4b11-9d00-fcbe38dfe2e5';
        $this->modelClass = UserDeadlineAssignmentModel::class;
    }


    public function onCreate($dataId)
    {

        $row = (new UserDeadlineAssignmentReader())->getRowById($dataId);
        $this->changeDeadline($row->deadline);
        $this->assignUser($row->userId);
        //$this->createUserTask($row->userId, $row->deadline);

    }

}