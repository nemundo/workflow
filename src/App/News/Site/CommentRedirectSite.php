<?php

namespace Nemundo\Workflow\App\News\Site;


use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\News\Data\Comment\CommentReader;
use Nemundo\Workflow\App\News\Parameter\NewsParameter;
use Nemundo\Workflow\Parameter\DataIdParameter;

class CommentRedirectSite extends AbstractSite
{

    /**
     * @var CommentRedirectSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'comment';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        CommentRedirectSite::$site = $this;
    }

    public function loadContent()
    {

        $commentId = (new DataIdParameter())->getValue();
        $commentRow = (new CommentReader())->getRowById($commentId);

        $site = clone(NewsItemSite::$site);
        $site->addParameter(new NewsParameter($commentRow->newsId));
        $site->redirect();

    }

}