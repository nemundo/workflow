<?php

namespace Nemundo\Workflow\App\News\Site;


use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\News\Content\Type\NewsContentType;
use Nemundo\Workflow\App\News\Parameter\NewsParameter;

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

        $newsParameter = new NewsParameter();
        $newsId = (new NewsParameter())->getValue();


        $newsType = new NewsContentType($newsId);
        $newsType->getView($page);


        /*
        $newsRow = (new NewsReader())->getRowById($newsId);

        $title = new AdminTitle($page);
        $title->content = $newsRow->title;

        $p = new Paragraph($page);
        $p->content = $newsRow->text;


        $contentType = new CommentContentTypeModelTree();
        $contentType->newsId = $newsId;

        //$form = (new CommentContentType())->getForm($page);
        //$form->model->newsId->defaultValue = $newsId;

        $form = $contentType->getForm($page);
        $form->redirectSite = NewsItemSite::$site;
        $form->redirectSite->addParameter($newsParameter);


        //$form = new CommentForm($page);
        //$form->model->newsId->defaultValue = $newsId;


        //$form->model->action->addInsertAction(new CommentAction());


        $list = new UnorderedList($page);

        $commentReader = new CommentReader();
        $commentReader->filter->andEqual($commentReader->model->newsId, $newsId);

        foreach ($commentReader->getData() as $commentRow) {

            $list->addText($commentRow->comment);

        }*/


        $page->render();

    }

}