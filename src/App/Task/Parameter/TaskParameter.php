<?php

namespace Nemundo\Workflow\App\Task\Parameter;

use Nemundo\Web\Http\Parameter\AbstractUrlParameter;

class TaskParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'task';
    }
}