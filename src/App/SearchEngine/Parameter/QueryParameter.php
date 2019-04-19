<?php

namespace Nemundo\Workflow\App\SearchEngine\Parameter;

use Nemundo\Web\Http\Parameter\AbstractGetParameter;

class QueryParameter extends AbstractGetParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'q';
    }
}