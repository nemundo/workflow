<?php

namespace Nemundo\Workflow\App\Wiki\Site;


use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\App\Wiki\Data\Wiki\WikiDelete;
use Nemundo\Workflow\App\Wiki\Data\Wiki\WikiUpdate;
use Nemundo\Workflow\App\Wiki\Parameter\WikiItemParameter;

class WikiItemDeleteSite extends AbstractSite
{

    /**
     * @var WikiItemDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'item-delete';
        $this->menuActive = false;
    }

    protected function registerSite()
    {
        WikiItemDeleteSite::$site = $this;
    }


    public function loadContent()
    {

//        $delete = new WikiDelete();
//        $delete->deleteById((new WikiItemParameter())->getValue());


        $update = new WikiUpdate();
        $update->delete = true;
        $update->updateById((new WikiItemParameter())->getValue());

        (new UrlReferer())->redirect();


    }

}