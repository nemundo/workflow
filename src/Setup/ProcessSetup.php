<?php

namespace Nemundo\Workflow\Setup;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Workflow\Data\Process\Process;
use Nemundo\Workflow\Data\Process\ProcessDelete;
use Nemundo\Workflow\Delete\WorkflowDelete;
use Nemundo\Workflow\Inbox\WorkflowInboxReader;
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


    public function removeProcess(AbstractProcess $process)
    {

        $reader = new WorkflowInboxReader();
        $reader->addProcessFilter($process);

        foreach ($reader->getData() as $workflowRow) {
            (new WorkflowDelete())->deleteWorkflow($workflowRow->id);
        }

        $delete = new ProcessDelete();
        $delete->deleteById($process->processId);

    }
}