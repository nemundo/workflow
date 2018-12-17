<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Type;

use Nemundo\Workflow\App\Assignment\Builder\AssignmentArchive;
use Nemundo\Workflow\App\Assignment\Builder\AssignmentBuilder;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\Content\Form\UserAssignmentForm;
use Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange\UserAssignmentChange;
use Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange\UserAssignmentChangeReader;


class UserAssignmentTemplateWorkflowStatus extends AbstractWorkflowStatus
{

    /**
     * @var string
     */
    public $userId;

    // assignmentUserId

    protected function loadType()
    {

        $this->contentLabel = 'Assignment';  //'Verantwortungswechsel';  // 'User Assignment';
        $this->contentName = 'user_assignment';
        $this->contentId = '24a41cf4-4ccd-43f1-baa5-40ae79e040fa';
        $this->changeStatus = false;
        //$this->modelClass = UserAssignmentChangeModel::class;

        $this->formClass = UserAssignmentForm::class;

        $this->viewClass = null;

    }


    public function saveType()
    {

        $data = new UserAssignmentChange();
        $data->userId = $this->userId;
        $this->dataId = $data->save();

        $this->saveContentLog();

        $builder = new AssignmentBuilder($this->parentContentType);
        $builder->archiveAssignment();
        $builder->assignment->setUserIdentification($this->userId);
        $builder->message = $this->getSubject();
        $builder->createAssignment();

    }


    public function getSubject()
    {

        $row = (new UserAssignmentChangeReader())->getRowById($this->dataId);

        $subject = 'Verantwortung geht an: ' . $row->user->displayName;
        return $subject;

    }


    public function getJson()
    {

        $row = (new UserAssignmentChangeReader())->getRowById($this->dataId);

        $data = parent::getJson();
        $data['assignment_login'] = $row->user->login;


        return $data;
    }


}