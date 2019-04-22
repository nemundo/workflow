<?php

namespace Nemundo\Workflow\App\ToDo\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class ToDoParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'todo';
    }
}