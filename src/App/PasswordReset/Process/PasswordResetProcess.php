<?php

namespace Nemundo\Workflow\App\PasswordReset\Process;


use Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest\PasswordResetRequestModel;
use Nemundo\Workflow\App\PasswordReset\Site\PasswordChangeSite;
use Nemundo\Workflow\App\PasswordReset\WorkflowStatus\PasswordResetStartWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;
use Nemundo\Workflow\Usergroup\WorkflowUsergroup;

class PasswordResetProcess extends AbstractProcess
{

    protected function loadData()
    {

        $this->name = 'Passoword Reset';
        $this->id = '087867de-bef4-4a08-8922-0367057481ae';
        $this->modelClass = PasswordResetRequestModel::class;
        $this->startWorkflowStatusClassName = PasswordResetStartWorkflowStatus::class;

        $this->itemSite = PasswordChangeSite::$site;

        //$this->restricted=true;
        //$this->addRestrictedUsergroup(new WorkflowUsergroup());

    }

}