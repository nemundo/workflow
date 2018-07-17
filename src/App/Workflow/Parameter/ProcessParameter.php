<?php

namespace Nemundo\Workflow\App\Workflow\Parameter;


use Nemundo\Web\Http\Parameter\AbstractUrlParameter;

class ProcessParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'process';
    }

}