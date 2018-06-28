<?php

namespace Nemundo\Workflow\App\PasswordReset\WorkflowStatus;

use Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest\PasswordResetRequestModel;
use Nemundo\Workflow\Template\WorkflowStatus\CommentWorkflowStatus;
use Nemundo\Workflow\Usergroup\WorkflowAdministratorUsergroup;
use Nemundo\Workflow\WorkflowStatus\AbstractDataWorkflowStatus;

class PasswordResetStartWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadType()
    {

        $this->name = 'Passwod Reset Start';
        $this->id = '582d6b76-c57f-437f-9ad4-1b785951beab';
        $this->modelClassName = PasswordResetRequestModel::class;

        //$this->restricted = true;
        //$this->addRestrictedUsergroup(new WorkflowAdministratorUsergroup());

        $this->addFollowingStatusClassName(CommentWorkflowStatus::class);
        $this->addFollowingStatusClassName(PasswordChangeWorkflowStatus::class);

    }

}