<?php

namespace Nemundo\Workflow\App\Wiki\Parameter;

use Nemundo\Web\Http\Parameter\AbstractUrlParameter;

class WikiPageParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'wikipage';
    }
}