<?php

namespace Nemundo\Workflow\App\Store\Parameter;

use Nemundo\Web\Http\Parameter\AbstractGetParameter;

class StoreParameter extends AbstractGetParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'store';
    }
}