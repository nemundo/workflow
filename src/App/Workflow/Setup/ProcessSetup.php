<?php

namespace Nemundo\Workflow\App\Workflow\Setup;


use Nemundo\App\Content\Type\Process\AbstractWorkflowProcess;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Workflow\App\Workflow\Data\Process\Process;

class ProcessSetup extends AbstractBaseClass
{

    public function addProcess(AbstractWorkflowProcess $process)
    {

        $data = new Process();
        $data->updateOnDuplicate = true;
        $data->id = $process->contentId;
        $data->process = $process->contentLabel;
        $data->processClass = $process->getClassName();
        $data->save();

        return $this;

    }

}