<?php

namespace Nemundo\Workflow\App\PasswordReset\Install;

use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\PasswordReset\Data\PasswordResetCollection;
use Nemundo\Workflow\App\PasswordReset\Process\PasswordResetProcess;
use Nemundo\Workflow\App\PasswordReset\WorkflowStatus\PasswordChangeWorkflowStatus;
use Nemundo\Workflow\App\PasswordReset\WorkflowStatus\PasswordResetStartWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Setup\ProcessSetup;
use Nemundo\Workflow\App\Workflow\Setup\WorkflowStatusSetup;

class PasswordResetInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ProcessSetup();
        $setup->addProcess(new PasswordResetProcess());

        $setup = new WorkflowStatusSetup();
        $setup->addWorkflowStatus(new PasswordResetStartWorkflowStatus());
        $setup->addWorkflowStatus(new PasswordChangeWorkflowStatus());

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new PasswordResetCollection());




    }
}