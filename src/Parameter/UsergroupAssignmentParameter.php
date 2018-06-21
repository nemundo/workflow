<?php

namespace Nemundo\Workflow\Parameter;


use Nemundo\Web\Http\Parameter\AbstractUrlParameter;

class UsergroupAssignmentParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'usergroup-assignment';
    }

}