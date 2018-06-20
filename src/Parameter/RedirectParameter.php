<?php

namespace Nemundo\Workflow\Parameter;


use Nemundo\Web\Http\Parameter\AbstractUrlParameter;

class RedirectParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'redirect';
    }

}