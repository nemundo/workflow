<?php

namespace Nemundo\Workflow\Parameter;

use Nemundo\Web\Http\Parameter\AbstractUrlParameter;

class DataIdParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'data-id';
    }
}