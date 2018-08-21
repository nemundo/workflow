<?php

namespace Nemundo\Workflow\Factory;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\App\Workflow\Data\Process\ProcessReader;
use Nemundo\Workflow\Data\Process\ProcessRow;

class ProcessFactory extends AbstractBase
{

    public function getProcessFromId($processId)
    {

        $processRow = (new ProcessReader())->getRowById($processId);
        $process = $processRow->getProcessClassObject();
        return $process;

    }


}