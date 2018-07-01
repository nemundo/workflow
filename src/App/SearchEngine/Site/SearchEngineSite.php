<?php

namespace Nemundo\Workflow\App\SearchEngine\Site;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;

class SearchEngineSite extends AbstractSite
{

    /**
     * @var SearchEngineSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Suchmaschine';
        $this->url = 'app-suchmaschine';

        new SearchEngineJsonSite($this);

    }


    protected function registerSite()
    {
        SearchEngineSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $title = new AdminTitle($page);
        $title->content = $this->title;


        $page->render();


    }

}