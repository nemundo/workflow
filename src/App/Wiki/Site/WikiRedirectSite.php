<?php

namespace Nemundo\Workflow\App\Wiki\Site;


use Nemundo\Core\Debug\Debug;
use Nemundo\Web\Http\Parameter\UrlParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlRedirect;
use Nemundo\Workflow\App\Wiki\Data\Wiki\WikiReader;
use Nemundo\Workflow\App\Wiki\Parameter\PageParameter;
use Nemundo\App\Content\Parameter\DataIdParameter;

class WikiRedirectSite extends AbstractSite
{

    /**
     * @var WikiRedirectSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'wiki-redirect';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        WikiRedirectSite::$site = $this;
    }


    public function loadContent()
    {


        $dataId = (new DataIdParameter())->getValue();


        $reader = new WikiReader();
        $reader->filter->andEqual($reader->model->dataId, $dataId);
        $row = $reader->getRow();

        $site = clone(WikiPageSite::$site);
        $site->addParameter(new PageParameter($row->pageId));
        $site->anchor = $row->dataId;

        $site->redirect();

    }

}