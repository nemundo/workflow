<?php

namespace Nemundo\Workflow\Setup;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\Data\Process\Process;
use Nemundo\Workflow\Process\AbstractProcess;

class ProcessSetup extends AbstractBase
{

    public function addProcess(AbstractProcess $process)
    {

        $data = new Process();
        $data->updateOnDuplicate = true;
        $data->id = $process->processId;
        $data->process = $process->process;
        $data->processClass = $process->getClassName();
        $data->save();

    }

}