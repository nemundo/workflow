<?php

namespace Nemundo\Workflow\App\Workflow\Check;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Workflow\App\Workflow\Content\Process\AbstractWorkflowProcess;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;

class WorkflowCheck extends AbstractBaseClass
{


    public function checkWorkflowStatus(AbstractWorkflowStatus $workflowStatus)
    {

        if ($workflowStatus->isObjectOfClass(AbstractWorkflowProcess::class)) {
            return;
        }

        $currentStatus = null;
        if ($workflowStatus->parentContentType !== null) {

            $currentStatus = $workflowStatus->parentContentType->getStatus();
            if ($currentStatus == null) {
                return;
            }

        }

        $valid = false;
        $next = $currentStatus->getNextContentType();
        if ($next !== null) {
            if ($next->getClassName() == $workflowStatus->getClassName()) {

                if ($next->checkUserVisibility()) {
                    $valid = true;
                    //(new Debug())->write('next');
                }
            }
        }

        foreach ($currentStatus->getMenuContentType() as $menu) {
            if ($menu->getClassName() == $workflowStatus->getClassName()) {

                if ($menu->checkUserVisibility()) {
                    $valid = true;
                    //(new Debug())->write('next2');
                }
            }
        }

        if (!$valid) {
            (new LogMessage())->writeError('Workflow Operation not allowed. Status: ' . $workflowStatus->getClassName());
            (new Debug())->write('Current Status: ' . $currentStatus->contentLabel);
            exit;
        }

    }

}