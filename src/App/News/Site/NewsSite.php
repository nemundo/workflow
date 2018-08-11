<?php

namespace Nemundo\Workflow\App\News\Site;


use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\News\Action\NewsAction;
use Nemundo\Workflow\App\News\Data\News\NewsForm;
use Nemundo\Workflow\App\News\Data\News\NewsTable;

class NewsSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'News';
        $this->url = 'news';

        new NewsItemSite($this);
        new CommentRedirectSite($this);

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        new NewsTable($page);


        $form = new NewsForm($page);
        //$form->model->action->addInsertAction(new NewsAction());


        $page->render();


    }


}