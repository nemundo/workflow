<?php

namespace Nemundo\Workflow\App\Workflow\Parameter;

use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
use Nemundo\Workflow\App\Workflow\Data\WorkflowStatus\WorkflowStatusReader;

class WorkflowStatusParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'workflow-status';
    }


    public function getWorkflowStatus()
    {

        $row = (new WorkflowStatusReader())->getRowById($this->getValue());
        $workflowStatus = $row->getWorkflowStatusClassObject();
        return $workflowStatus;

    }

}