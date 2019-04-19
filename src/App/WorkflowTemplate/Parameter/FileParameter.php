<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Parameter;

use Nemundo\Web\Http\Parameter\AbstractGetParameter;

class FileParameter extends AbstractGetParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'file';
    }
}