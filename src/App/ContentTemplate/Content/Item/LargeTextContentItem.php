<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Item;


use Nemundo\App\Content\Item\AbstractContentItem;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Workflow\App\ContentTemplate\Data\LargeText\LargeTextReader;

class LargeTextContentItem extends AbstractContentItem
{

    public function getHtml()
    {

        $row = (new LargeTextReader())->getRowById($this->dataId);

        $p = new Paragraph($this);
        $p->content = (new Html($row->text))->getValue();

        return parent::getHtml();
    }

}