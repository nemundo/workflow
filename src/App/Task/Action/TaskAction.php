<?php

namespace Nemundo\Workflow\App\Task\Action;


use Nemundo\Workflow\App\Task\Data\Task\AbstractTaskAction;
use Nemundo\Workflow\App\Task\Process\TaskProcess;
use Nemundo\Workflow\App\Workflow\Event\WorkflowStartEvent;

class TaskAction extends AbstractTaskAction
{


    public function run($id)
    {

        $event = new WorkflowStartEvent();
        $event->process = new TaskProcess();
        $event->run($id);

    }


}