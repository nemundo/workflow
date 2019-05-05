<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Form;


use Nemundo\App\Content\Form\AbstractContentTreeForm;
use Nemundo\User\Data\User\UserListBox;
use Nemundo\User\Data\User\UserReader;
use Nemundo\Workflow\App\WorkflowTemplate\Content\Type\UserAssignmentTemplateWorkflowStatus;

class UserAssignmentForm extends AbstractContentTreeForm
{

    /**
     * @var UserListBox
     */
    private $user;

    public function getContent()
    {

        $this->user = new UserListBox($this);

        return parent::getContent();
    }

    protected function onSubmit()
    {

        $status = new UserAssignmentTemplateWorkflowStatus();
        $status->parentContentType = $this->parentContentType;
        $status->userId = $this->user->getValue();
        $status->saveType();

    }


}