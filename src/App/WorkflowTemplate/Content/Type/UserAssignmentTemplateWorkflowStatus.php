<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Type;

use Nemundo\Workflow\App\Workflow\Content\Type\AbstractModelDataWorkflowStatus;
use Nemundo\Core\Debug\Debug;
use Nemundo\Workflow\App\Assignment\Builder\AssignmentArchive;
use Nemundo\Workflow\App\Assignment\Builder\AssignmentBuilder;
use Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange\UserAssignmentChangeModel;
use Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange\UserAssignmentChangeReader;


class UserAssignmentTemplateWorkflowStatus extends AbstractModelDataWorkflowStatus
{

    protected function loadType()
    {

        $this->contentName = 'Verantwortungswechsel';  // 'User Assignment';
        $this->contentId = '24a41cf4-4ccd-43f1-baa5-40ae79e040fa';
        $this->changeStatus = false;
        $this->modelClass = UserAssignmentChangeModel::class;
        $this->viewClass = null;

    }


    public function onCreate()
    {

        (new AssignmentArchive())->archiveAssignment($this->parentContentType->dataId);


        $row = (new UserAssignmentChangeReader())->getRowById($this->dataId);

        $builder = new AssignmentBuilder();
        $builder->contentType = $this->parentContentType;
        $builder->assignment->setUserIdentification($row->userId);
        $builder->message = $this->getSubject();
        $builder->createAssignment();

    }


    public function getSubject()
    {

        $row = (new UserAssignmentChangeReader())->getRowById($this->dataId);

        $subject = 'Verantwortung geht an: ' . $row->user->displayName;
        return $subject;

    }

}