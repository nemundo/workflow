<?php

namespace Nemundo\Workflow\App\PasswordReset\WorkflowStatus;

use Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest\PasswordResetRequestModel;
use Nemundo\Workflow\Template\WorkflowStatus\CommentWorkflowStatus;
use Nemundo\Workflow\Usergroup\WorkflowAdministratorUsergroup;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;

class PasswordResetStartWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadData()
    {

        $this->objectName = 'Passwod Reset Start';
        $this->objectId = '582d6b76-c57f-437f-9ad4-1b785951beab';
        $this->modelClass = PasswordResetRequestModel::class;

        //$this->restricted = true;
        //$this->addRestrictedUsergroup(new WorkflowAdministratorUsergroup());

        $this->addFollowingContentTypeClass(CommentWorkflowStatus::class);
        $this->addFollowingContentTypeClass(PasswordChangeWorkflowStatus::class);

    }

}