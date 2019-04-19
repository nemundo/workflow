<?php

namespace Nemundo\Workflow\App\Workflow\Parameter;

use Nemundo\Web\Http\Parameter\AbstractGetParameter;
use Nemundo\Workflow\App\Workflow\Com\ListBox\Item\OpenListBoxItem;

class StatusParameter extends AbstractGetParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'workflow-status';
        $this->defaultValue = (new OpenListBoxItem())->id;
    }
}