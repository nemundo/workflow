<?php

namespace Nemundo\Workflow\App\Message\ContentItem;


use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Workflow\App\Message\Data\MessageText\MessageTextReader;

class TextContentView extends AbstractContentView
{

    public function getHtml()
    {

        $row = (new MessageTextReader())->getRowById($this->dataId);

        $p = new Paragraph($this);
        $p->content = (new Html($row->text))->getValue();

        return parent::getHtml();
    }

}