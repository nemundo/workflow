<?php

namespace Nemundo\Workflow\App\News\Site;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Com\Html\Basic\Hr;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Com\Html\Hyperlink\Hyperlink;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\News\Content\Type\NewsContentType;
use Nemundo\Workflow\App\News\Data\News\NewsReader;
use Nemundo\Workflow\App\News\Parameter\NewsParameter;

class NewsSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'News';
        $this->url = 'news';

        new NewsItemSite($this);
        //new CommentRedirectSite($this);

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $form = (new NewsContentType())->getForm($page);


        $newsReader = new NewsReader();
        $newsReader->addOrder($newsReader->model->dateTime, SortOrder::DESCENDING);

        foreach ($newsReader->getData() as $newsRow) {


            $link = new Hyperlink($page);
            $link->site = clone(NewsItemSite::$site);
            $link->site->addParameter(new NewsParameter($newsRow->id));

            $subtitle = new AdminSubtitle($link);
            $subtitle->content = $newsRow->title;

            $p = new Paragraph($page);
            $p->content = $newsRow->text;

            (new Hr($page));

        }

        $page->render();

    }

}