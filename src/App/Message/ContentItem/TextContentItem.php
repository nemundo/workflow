<?php

namespace Nemundo\Workflow\App\Message\ContentItem;


use Nemundo\App\Content\Item\AbstractContentItem;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Workflow\App\Message\Data\MessageText\MessageTextReader;

class TextContentItem extends AbstractContentItem
{

    public function getHtml()
    {

        $row = (new MessageTextReader())->getRowById($this->dataId);

        $p = new Paragraph($this);
        $p->content = $row->text;

        return parent::getHtml();
    }

}