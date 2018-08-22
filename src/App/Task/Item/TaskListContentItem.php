<?php

namespace Nemundo\Workflow\App\Task\Item;


use Nemundo\App\Content\Item\AbstractContentItem;
use Nemundo\Workflow\App\Task\Data\Task\TaskTable;

class TaskListContentItem extends AbstractContentItem
{

    public function getHtml()
    {

        $table = new TaskTable($this);
        $table->filter->andEqual($table->model->sourceId, $this->dataId);

        return parent::getHtml();

    }

}