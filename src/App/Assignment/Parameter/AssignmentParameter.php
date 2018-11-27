<?php

namespace Nemundo\Workflow\App\Assignment\Parameter;

use Nemundo\Web\Http\Parameter\AbstractUrlParameter;

class AssignmentParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'assignment';
    }
}