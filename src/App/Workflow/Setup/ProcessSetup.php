<?php

namespace Nemundo\Workflow\App\Workflow\Setup;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\Workflow\App\Workflow\Data\Process\Process;
use Nemundo\Workflow\App\Workflow\Data\Process\ProcessDelete;
use Nemundo\Workflow\Delete\WorkflowDelete;
use Nemundo\Workflow\Inbox\WorkflowInboxReader;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;

class ProcessSetup extends AbstractBase
{

    public function addProcess(AbstractProcess $process)
    {

        $data = new Process();
        $data->updateOnDuplicate = true;
        $data->id = $process->id;
        $data->process = $process->name;
        $data->processClass = $process->getClassName();
        $data->save();

        $setup = new ContentTypeSetup();
        $setup->addContentType($process);


    }


    public function removeProcess(AbstractProcess $process)
    {

        $reader = new WorkflowInboxReader();
        $reader->addProcessFilter($process);

        foreach ($reader->getData() as $workflowRow) {
            (new WorkflowDelete())->deleteWorkflow($workflowRow->id);
        }

        $delete = new ProcessDelete();
        $delete->deleteById($process->id);

    }
}