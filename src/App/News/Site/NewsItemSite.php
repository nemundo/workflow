<?php

namespace Nemundo\Workflow\App\News\Site;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\News\Action\CommentAction;
use Nemundo\Workflow\App\News\Data\Comment\CommentForm;
use Nemundo\Workflow\App\News\Data\Comment\CommentReader;
use Nemundo\Workflow\App\News\Data\News\NewsReader;
use Nemundo\Workflow\App\News\Parameter\NewsParameter;
use Nemundo\App\Content\Parameter\DataIdParameter;

class NewsItemSite extends AbstractSite
{

    /**
     * @var NewsItemSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'item';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        NewsItemSite::$site = $this;
    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        //$newsId = (new DataIdParameter())->getValue();
        $newsId = (new NewsParameter())->getValue();
        $newsRow = (new NewsReader())->getRowById($newsId);

        $title = new AdminTitle($page);
        $title->content = $newsRow->title;

        $p = new Paragraph($page);
        $p->content = $newsRow->text;


        $form = new CommentForm($page);
        $form->model->newsId->defaultValue = $newsId;
        $form->model->action->addInsertAction(new CommentAction());


        $list = new UnorderedList($page);

        $commentReader = new CommentReader();
        $commentReader->filter->andEqual($commentReader->model->newsId, $newsId);

        foreach ($commentReader->getData() as $commentRow) {

            $list->addText($commentRow->comment);

        }


        $page->render();

    }

}