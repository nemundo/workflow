<?php

namespace Nemundo\Workflow\App\Workflow\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;
use Nemundo\Workflow\App\Workflow\Com\ListBox\Item\OpenListBoxItem;

class StatusParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'workflow-status';
        $this->defaultValue = (new OpenListBoxItem())->id;
    }
}