<?php

namespace Nemundo\Workflow\App\Store\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class StoreTypeParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'storetype';
    }
}