<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Form;


use Nemundo\App\Content\Form\ContentTreeForm;
use Nemundo\User\Data\User\UserListBox;
use Nemundo\User\Data\User\UserReader;
use Nemundo\Workflow\App\WorkflowTemplate\Content\Type\UserAssignmentTemplateWorkflowStatus;

class UserAssignmentForm extends ContentTreeForm
{

    /**
     * @var UserListBox
     */
    private $user;

    public function getHtml()
    {

        $this->user = new UserListBox($this);

        return parent::getHtml();
    }

    protected function onSubmit()
    {

        $status = new UserAssignmentTemplateWorkflowStatus();
        $status->parentContentType = $this->parentContentType;
        $status->userId = $this->user->getValue();
        $status->saveType();

    }


}