<?php

namespace Nemundo\Workflow\App\Assignment\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class AssignmentParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'assignment';
    }
}