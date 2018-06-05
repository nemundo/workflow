<?php

namespace Nemundo\Workflow\Parameter;


use Nemundo\Web\Http\Parameter\AbstractUrlParameter;

class NotificationParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'notification';
    }

}