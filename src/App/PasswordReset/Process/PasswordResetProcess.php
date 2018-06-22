<?php

namespace Nemundo\Workflow\App\PasswordReset\Process;


use Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest\PasswordResetRequestModel;
use Nemundo\Workflow\App\PasswordReset\Site\PasswordChangeSite;
use Nemundo\Workflow\App\PasswordReset\WorkflowStatus\PasswordResetStartWorkflowStatus;
use Nemundo\Workflow\Process\AbstractProcess;
use Nemundo\Workflow\Usergroup\WorkflowUsergroup;

class PasswordResetProcess extends AbstractProcess
{

    protected function loadProcess()
    {

        $this->process = 'Passoword Reset';
        $this->processId = '087867de-bef4-4a08-8922-0367057481ae';
        $this->baseModelClassName = PasswordResetRequestModel::class;
        $this->startWorkflowStatusClassName = PasswordResetStartWorkflowStatus::class;

        $this->site = PasswordChangeSite::$site;

        //$this->restricted=true;
        //$this->addRestrictedUsergroup(new WorkflowUsergroup());

    }

}