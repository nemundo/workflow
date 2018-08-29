<?php

namespace Nemundo\Workflow\App\Task\Item;


use Nemundo\App\Content\Item\AbstractContentItem;
use Nemundo\Workflow\App\Task\Data\SourceTask\SourceTaskTable;
use Nemundo\Workflow\App\Task\Data\Task\TaskTable;
use Nemundo\Workflow\App\Task\Table\SourceTaskContentTable;
use Nemundo\Workflow\App\Task\Table\TaskContentTable;

class SourceTaskContentItem extends AbstractContentItem
{

    public function getHtml()
    {

        //$table = new TaskTable($this);
        //$table->filter->andEqual($table->model->sourceId, $this->dataId);

        //$table = new SourceTaskTable($this);
        //$table->filter->andEqual($table->model->dataId, $this->dataId);

        $table = new SourceTaskContentTable($this);
        $table->dataId = $this->dataId;


        return parent::getHtml();

    }

}