<?php

namespace Nemundo\Workflow\App\Workflow\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class WorkflowParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'workflow';
    }
}