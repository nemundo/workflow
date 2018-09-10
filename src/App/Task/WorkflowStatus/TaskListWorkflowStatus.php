<?php

namespace Nemundo\Workflow\App\Task\WorkflowStatus;


use Nemundo\Workflow\App\Task\Form\TaskListContentForm;
use Nemundo\Workflow\App\Task\Item\TaskListContentItem;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;

class TaskListWorkflowStatus extends AbstractWorkflowStatus
{

    protected function loadData()
    {

        $this->objectName = 'Aufgaben Liste';
        $this->objectId = 'fea83ba0-dbfa-4242-b4a5-221b9ba9ed5c';
        $this->changeWorkflowStatus = false;
        $this->draftMode = true;

        $this->formClass = TaskListContentForm::class;
        $this->itemClass = TaskListContentItem::class;

    }

}