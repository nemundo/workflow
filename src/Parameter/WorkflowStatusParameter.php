<?php

namespace Nemundo\Workflow\Parameter;

use Nemundo\Web\Http\Parameter\AbstractUrlParameter;

class WorkflowStatusParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'workflowstatus';
    }
}