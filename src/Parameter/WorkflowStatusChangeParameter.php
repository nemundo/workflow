<?php

namespace Nemundo\Workflow\Parameter;

use Nemundo\Web\Http\Parameter\AbstractUrlParameter;

class WorkflowStatusChangeParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'statuschange';
    }
}