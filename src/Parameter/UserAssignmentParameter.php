<?php

namespace Nemundo\Workflow\Parameter;


use Nemundo\Web\Http\Parameter\AbstractUrlParameter;

class UserAssignmentParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'user-assignment';
    }

}