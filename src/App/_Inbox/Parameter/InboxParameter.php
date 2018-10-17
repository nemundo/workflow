<?php

namespace Nemundo\Workflow\App\Inbox\Parameter;

use Nemundo\Web\Http\Parameter\AbstractUrlParameter;

class InboxParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'inbox';
    }
}