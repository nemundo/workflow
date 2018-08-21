<?php

namespace Nemundo\Workflow\App\News\Content\Item;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Workflow\App\News\Data\Comment\CommentReader;
use Nemundo\Workflow\App\News\Data\News\NewsReader;
use Nemundo\App\Content\Item\AbstractContentItem;

class CommentContentItem extends AbstractContentItem
{

    public function getHtml()
    {


        $commentRow = (new CommentReader())->getRowById($this->dataId);


        $title = new AdminTitle($this);
        $title->content = 'Kommentar aus dem Artikel '. $commentRow->news->title;

        $p = new Paragraph($this);
        $p->content = $commentRow->comment;


        return parent::getHtml();
    }


}