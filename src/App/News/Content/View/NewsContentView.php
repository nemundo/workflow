<?php

namespace Nemundo\Workflow\App\News\Content\View;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Workflow\App\News\Data\News\NewsReader;

class NewsContentView extends AbstractContentView
{

    public function getHtml()
    {

        $newsRow = (new NewsReader())->getRowById($this->dataId);

        $title = new AdminTitle($this);
        $title->content = $newsRow->title;

        $p = new Paragraph($this);
        $p->content = (new Html($newsRow->text))->getValue();


        return parent::getHtml();
    }


}