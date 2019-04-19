<?php

namespace Nemundo\Workflow\App\Store\Parameter;

use Nemundo\Web\Http\Parameter\AbstractGetParameter;

class StoreTypeParameter extends AbstractGetParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'storetype';
    }
}