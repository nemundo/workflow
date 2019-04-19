<?php

namespace Nemundo\Workflow\App\ToDo\Parameter;

use Nemundo\Web\Http\Parameter\AbstractGetParameter;

class ToDoParameter extends AbstractGetParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'todo';
    }
}