<?php

namespace Nemundo\Workflow\App\Workflow\Check;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Log\LogFile;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;

class WorkflowCheck extends AbstractBaseClass
{


    public function checkWorkflowStatus(AbstractWorkflowStatus $workflowStatus)
    {


        if (!$workflowStatus->checkUserVisibility()) {
            (new LogFile())->writeError('Restricted Content Type');
        }


        /*
        if ($workflowStatus->isObjectOfClass(AbstractWorkflowProcess::class)) {
            return;
        }*/


        //if ($workflowStatus->workflowCheck) {

        $currentStatus = null;
        if ($workflowStatus->parentContentType !== null) {

            $currentStatus = $workflowStatus->parentContentType->getCurrentStatus();
            /*   if ($currentStatus == null) {
                   return;
               }*/

        }

        if ($currentStatus == null) {
            return;
        }


        $valid = false;
        $next = $currentStatus->getNextContentType();
        if ($next !== null) {
            if ($next->getClassName() == $workflowStatus->getClassName()) {

                //if ($next->checkUserVisibility()) {
                $valid = true;
                //}
            }
        }

        foreach ($currentStatus->getMenuContentType() as $menu) {
            if ($menu->getClassName() == $workflowStatus->getClassName()) {

                //if ($menu->checkUserVisibility()) {
                $valid = true;
                //}
            }
        }


        if (!$valid) {

            (new LogFile())->writeError('Workflow Operation not allowed. Status: ' . $workflowStatus->getClassName());
            //(new LogMessage())->writeError('Workflow Operation not allowed. Status: ' . $workflowStatus->getClassName());
            //(new Debug())->write('Current Status: ' . $currentStatus->contentLabel);
            //exit;
        }

        //}


    }


    public function checkUserVisibility()
    {


    }


}