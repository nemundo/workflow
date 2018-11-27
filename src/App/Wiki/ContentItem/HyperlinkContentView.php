<?php

namespace Nemundo\Workflow\App\Wiki\ContentItem;


use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Workflow\App\Wiki\Data\Hyperlink\HyperlinkReader;

class HyperlinkContentView extends AbstractContentView
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