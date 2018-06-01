<?php

namespace Nemundo\Workflow\Factory;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class WorkflowStatusFactory extends AbstractBase
{

    public function getWorkflowStatus($className) {

        /** @var AbstractWorkflowStatus $workflowStatus */
        $workflowStatus = new $className();

        return $workflowStatus;

    }

}