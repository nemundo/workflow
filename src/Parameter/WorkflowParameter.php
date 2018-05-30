<?php

namespace Nemundo\Workflow\Parameter;

use Nemundo\Web\Http\Parameter\AbstractUrlParameter;

class WorkflowParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'workflow';
    }
}