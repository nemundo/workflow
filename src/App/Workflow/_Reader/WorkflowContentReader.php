<?php

namespace Nemundo\Workflow\App\Workflow\Reader;


use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;

class WorkflowContentReader extends WorkflowReader
{


    //


    public function addProcessFilter(AbstractProcess $process)
    {

        $this->filter->andEqual($this->model->processId, $process->objectId);

    }


}