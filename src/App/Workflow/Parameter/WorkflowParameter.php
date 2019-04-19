<?php

namespace Nemundo\Workflow\App\Workflow\Parameter;

use Nemundo\Web\Http\Parameter\AbstractGetParameter;

class WorkflowParameter extends AbstractGetParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'workflow';
    }
}