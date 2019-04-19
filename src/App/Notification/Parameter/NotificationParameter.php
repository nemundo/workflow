<?php

namespace Nemundo\Workflow\App\Notification\Parameter;

use Nemundo\Web\Http\Parameter\AbstractGetParameter;

class NotificationParameter extends AbstractGetParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'notification';
    }
}