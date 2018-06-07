<?php

namespace Nemundo\Workflow\Script;


use Nemundo\Core\Debug\Debug;
use Nemundo\Dev\Script\AbstractScript;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Delete\WorkflowDelete;

class WorkflowClean extends AbstractScript
{

    protected function loadScript()
    {

        $this->scriptName = 'workflow-clean';
        $this->consoleScript = true;

    }


    public function run()
    {

        $workflowReader = new WorkflowReader();
        foreach ($workflowReader->getData() as $workflowRow) {
            (new WorkflowDelete())->deleteWorkflow($workflowRow->id);
            (new Debug())->write($workflowRow->workflowNumber);
        }

    }

}