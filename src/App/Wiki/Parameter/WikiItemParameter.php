<?php

namespace Nemundo\Workflow\App\Wiki\Parameter;

use Nemundo\Web\Http\Parameter\AbstractUrlParameter;

class WikiItemParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'wikiitem';
    }
}