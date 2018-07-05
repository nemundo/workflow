<?php

namespace Nemundo\Workflow\App\Wiki\ContentItem;


use Nemundo\App\Content\Item\AbstractContentItem;
use Nemundo\Workflow\App\Wiki\Data\Hyperlink\Hyperlink;
use Nemundo\Workflow\App\Wiki\Data\Hyperlink\HyperlinkReader;

class HyperlinkContentItem extends AbstractContentItem
{

    public function getHtml()
    {

        $row = (new HyperlinkReader())->getRowById($this->dataId);

        $hyperlink = new \Nemundo\Com\Html\Hyperlink\Hyperlink($this);
        $hyperlink->content = $row->title;
        $hyperlink->url = $row->url;


        return parent::getHtml();
    }

}