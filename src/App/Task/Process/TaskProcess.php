<?php

namespace Nemundo\Workflow\App\Task\Process;


use Nemundo\Workflow\App\Task\Data\Task\TaskModel;
use Nemundo\Workflow\App\Task\Site\TaskItemSite;
use Nemundo\Workflow\App\Task\WorkflowStatus\TaskErfassungWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;

class TaskProcess extends AbstractProcess
{

    protected function loadData()
    {
        $this->name = 'Task';
        $this->id = 'a480102a-6e69-4233-986d-f37db267e5aa';

        //$this->itemClass = PersonalTaskContentItem::class;
        $this->itemSite = TaskItemSite::$site;
        $this->prefix = 'T-';
        $this->modelClass = TaskModel::class;
        $this->startWorkflowStatusClass = TaskErfassungWorkflowStatus::class;


    }

}