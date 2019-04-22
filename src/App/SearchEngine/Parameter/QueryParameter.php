<?php

namespace Nemundo\Workflow\App\SearchEngine\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class QueryParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'q';
    }
}