<?php

namespace Nemundo\Workflow\App\Workflow\Parameter;

use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
use Nemundo\Workflow\App\Workflow\Com\ListBox\Item\OpenListBoxItem;

class StatusParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'status';
        $this->defaultValue = (new OpenListBoxItem())->id;
    }
}