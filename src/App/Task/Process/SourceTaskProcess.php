<?php

namespace Nemundo\Workflow\App\Task\Process;


use Nemundo\Workflow\App\Task\Data\SourceTask\SourceTaskModel;
use Nemundo\Workflow\App\Task\Data\SourceTask\SourceTaskReader;
use Nemundo\Workflow\App\Task\Data\Task\TaskModel;
use Nemundo\Workflow\App\Task\Item\TaskProcessContentItem;
use Nemundo\Workflow\App\Task\Parameter\TaskParameter;
use Nemundo\Workflow\App\Task\Site\SourceTaskItemSite;
use Nemundo\Workflow\App\Task\Site\TaskItemSite;
use Nemundo\Workflow\App\Task\WorkflowStatus\SourceTaskErfassungWorkflowStatus;
use Nemundo\Workflow\App\Task\WorkflowStatus\SourceTaskListErfassungWorkflowStatus;
use Nemundo\Workflow\App\Task\WorkflowStatus\TaskErfassungWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Process\AbstractModelProcess;

class SourceTaskProcess extends AbstractModelProcess
{

    protected function loadData()
    {
        $this->contentName = 'Source Task Aufgabe';
        $this->contentId = 'a2ddd161-153e-4788-a575-10d7486e690c';

        //$this->itemClass = TaskProcessContentItem::class;
        $this->itemSite = SourceTaskItemSite::$site;
        $this->parameterClass = TaskParameter::class;
        $this->prefix = 'ST-';
        $this->startNumber = 200;
        $this->modelClass = SourceTaskModel::class;

        $this->startWorkflowStatusClass = SourceTaskErfassungWorkflowStatus::class;

    }


    public function getSource($dataId)
    {

        $sourceTaskRow = (new SourceTaskReader())->getRowById($dataId);
        $source = $sourceTaskRow->source;
        return $source;

    }


}