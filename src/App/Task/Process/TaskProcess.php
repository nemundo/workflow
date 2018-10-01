<?php

namespace Nemundo\Workflow\App\Task\Process;


use Nemundo\Workflow\App\Task\Data\Task\TaskModel;
use Nemundo\Workflow\App\Task\Item\TaskProcessContentItem;
use Nemundo\Workflow\App\Task\Parameter\TaskParameter;
use Nemundo\Workflow\App\Task\Site\TaskItemSite;
use Nemundo\Workflow\App\Task\WorkflowStatus\TaskErfassungWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Process\AbstractModelProcess;

class TaskProcess extends AbstractModelProcess
{

    protected function loadData()
    {
        $this->contentName = 'Aufgabe';
        $this->contentId = 'a480102a-6e69-4233-986d-f37db267e5aa';

        $this->viewClass = TaskProcessContentItem::class;
        $this->itemSite =  TaskItemSite::$site;
        $this->parameterClass = TaskParameter::class;
        $this->prefix = 'T-';
        $this->modelClass = TaskModel::class;

        $this->startWorkflowStatusClass = TaskErfassungWorkflowStatus::class;

    }

}