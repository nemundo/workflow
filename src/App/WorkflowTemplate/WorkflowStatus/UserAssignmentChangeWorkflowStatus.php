<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus;

use Nemundo\Core\Debug\Debug;
use Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange\UserAssignmentChangeModel;
use Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange\UserAssignmentChangeReader;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;



// UserAssignmentTemplateWorkflowStatus
class UserAssignmentChangeWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadData()
    {
// Nemundo\Workflow\Template\WorkflowStatus\UserAssignmentChangeWorkflowStatus
        $this->name = 'User Assignment';
        $this->id = '24a41cf4-4ccd-43f1-baa5-40ae79e040fa';
        $this->changeWorkflowStatus = false;
        $this->modelClass = UserAssignmentChangeModel::class;

    }


    public function onCreate($dataId)
    {

        $row = (new UserAssignmentChangeReader())->getRowById($dataId);

        $this->createUserTask($row->userId);
        //$this->assignUser($row->userId);



    }

}