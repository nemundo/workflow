<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus;

use Nemundo\Core\Debug\Debug;
use Nemundo\Workflow\App\Assignment\Builder\AssignmentArchive;
use Nemundo\Workflow\App\Assignment\Builder\AssignmentBuilder;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowItem;
use Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange\UserAssignmentChangeModel;
use Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange\UserAssignmentChangeReader;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;


// UserAssignmentTemplateWorkflowStatus
class UserAssignmentChangeWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadData()
    {

        $this->objectName = 'Verantwortungswechsel';  // 'User Assignment';
        $this->objectId = '24a41cf4-4ccd-43f1-baa5-40ae79e040fa';
        $this->changeWorkflowStatus = false;
        $this->modelClass = UserAssignmentChangeModel::class;

    }


    public function onCreate($dataId)
    {

        $this->clearAssignment();
        $row = (new UserAssignmentChangeReader())->getRowById($dataId);
        $this->assignUser($row->userId);


        $workflowItem = (new WorkflowItem())->fromDataId($dataId);

        (new AssignmentArchive())->archiveAssignment($workflowItem->workflowId);

        $builder = new AssignmentBuilder();
        $builder->contentType = $workflowItem->getProcess();
        $builder->dataId = $workflowItem->workflowId;
        $builder->assignment->setUserIdentification($row->userId);
        $builder->subject = $workflowItem->getSubject();
        $builder->message = $this->getStatusText($dataId);
        $builder->createAssignment();

    }

}