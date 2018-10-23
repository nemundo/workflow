<?php

namespace Nemundo\Workflow\App\PasswordReset\WorkflowStatus;

use Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest\PasswordResetRequestModel;
use Nemundo\Workflow\Template\WorkflowStatus\CommentWorkflowStatus;
use Nemundo\Workflow\Usergroup\WorkflowAdministratorUsergroup;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractModelDataWorkflowStatus;

class PasswordResetStartWorkflowStatus extends AbstractModelDataWorkflowStatus
{

    protected function loadType()
    {

        $this->contentLabel = 'Passwod Reset Start';
        $this->contentId = '582d6b76-c57f-437f-9ad4-1b785951beab';
        $this->modelClass = PasswordResetRequestModel::class;

        //$this->restricted = true;
        //$this->addRestrictedUsergroup(new WorkflowAdministratorUsergroup());

        $this->addFollowingContentTypeClass(CommentWorkflowStatus::class);
        $this->addFollowingContentTypeClass(PasswordChangeWorkflowStatus::class);

    }

}