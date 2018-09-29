<?php

namespace Nemundo\Workflow\App\Task\Item;


use Nemundo\App\Content\Item\AbstractContentItem;
use Nemundo\Workflow\App\Task\Data\Task\TaskTable;
use Nemundo\Workflow\App\Task\Table\TaskContentTable;

class TaskListContentItem extends AbstractContentItem
{

    public function getHtml()
    {

        //$table = new TaskTable($this);
        //$table->filter->andEqual($table->model->sourceId, $this->dataId);

        $table = new TaskContentTable($this);
        $table->dataId = $this->dataId;


        return parent::getHtml();

    }

}