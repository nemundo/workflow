<?php

namespace Nemundo\Workflow\App\Wiki\Content\View;


use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Com\Html\Listing\OrderedList;
use Nemundo\Workflow\App\Wiki\Data\TextList\TextListReader;

class TextListView extends AbstractContentView
{

    public function getHtml()
    {


        $reader = new TextListReader();
        $reader->filter->andEqual($reader->model->dataId, $this->dataId);

        $list = new OrderedList($this);

        foreach ($reader->getData() as $listRow) {
            $list->addText($listRow->text);
        }


        return parent::getHtml();

    }


}