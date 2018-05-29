<?php

namespace Nemundo\Workflow\Parameter;


use Nemundo\Web\Http\Parameter\AbstractUrlParameter;

class ProcessParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'process';
    }

}