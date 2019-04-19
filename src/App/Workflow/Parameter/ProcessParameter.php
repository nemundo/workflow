<?php

namespace Nemundo\Workflow\App\Workflow\Parameter;


use Nemundo\Web\Http\Parameter\AbstractGetParameter;
use Nemundo\Workflow\App\Workflow\Data\Process\ProcessReader;

class ProcessParameter extends AbstractGetParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'process';
    }


    public function getProcessClassName()
    {

        $processRow = (new ProcessReader())->getRowById($this->getValue());
        $className = $processRow->processClass;

        return $className;

    }

}