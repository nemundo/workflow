<?php

namespace Nemundo\Workflow\App\Workflow\Parameter;


use Nemundo\Web\Http\Parameter\AbstractUrlParameter;

class RedirectParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'redirect';
    }

}