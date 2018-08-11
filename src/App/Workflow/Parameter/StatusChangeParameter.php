<?php

namespace Nemundo\Workflow\App\Workflow\Parameter;

use Nemundo\Web\Http\Parameter\AbstractUrlParameter;

class StatusChangeParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'statuschange';
    }
}