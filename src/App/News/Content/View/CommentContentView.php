<?php

namespace Nemundo\Workflow\App\News\Content\Item;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Workflow\App\News\Data\Comment\CommentReader;

class CommentContentView extends AbstractContentView
{

    public function getHtml()
    {


        $commentRow = (new CommentReader())->getRowById($this->dataId);


        $title = new AdminTitle($this);
        $title->content = 'Kommentar aus dem Artikel ' . $commentRow->news->title;

        $p = new Paragraph($this);
        $p->content = $commentRow->comment;


        return parent::getHtml();
    }


}