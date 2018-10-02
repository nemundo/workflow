<?php

namespace Nemundo\Workflow\App\Task\Item;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Com\Html\Hyperlink\Hyperlink;
use Nemundo\Workflow\App\Task\Data\Task\TaskReader;
use Nemundo\Workflow\App\Workflow\Process\Item\ProcessContentView;

class TaskProcessContentItem extends ProcessContentView
{

    public function getHtml()
    {


        $taskReader = new TaskReader();
        $taskReader->model->loadSourceType();
        $taskRow = $taskReader->getRowById($this->dataId);

        $sourceType = $taskRow->sourceType->getContentTypeClassObject();

        /*$p = new Paragraph($this);
        $p->content = 'Source: ' . $sourceType->name;

        $p = new Paragraph($this);
        $p->content = 'Source Id: ' .$taskRow->sourceId;*/


        if ($sourceType !== null) {
            $btn = new AdminButton($this);
            $btn->content = $sourceType->getSubject($taskRow->sourceId) . ' ---' . $taskRow->source;
            $btn->site = $sourceType->getViewSite($taskRow->sourceId);
        }

        return parent::getHtml();

    }


}