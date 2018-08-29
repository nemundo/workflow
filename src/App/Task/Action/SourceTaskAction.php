<?php

namespace Nemundo\Workflow\App\Task\Action;


use Nemundo\Core\Debug\Debug;
use Nemundo\Workflow\App\Task\Data\SourceTask\AbstractSourceTaskAction;
use Nemundo\Workflow\App\Task\Data\Task\AbstractTaskAction;
use Nemundo\Workflow\App\Task\Process\SourceTaskProcess;
use Nemundo\Workflow\App\Task\Process\TaskProcess;
use Nemundo\Workflow\App\Workflow\Event\WorkflowStartEvent;

class SourceTaskAction extends AbstractSourceTaskAction
{


    public function run($id)
    {

        //(new Debug())->write('action'.$id);

        $event = new WorkflowStartEvent();
        $event->process = new SourceTaskProcess();
        $event->run($id);

        //exit;

    }


}