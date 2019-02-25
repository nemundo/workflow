<?php

namespace Nemundo\Workflow\App\Identification\Site;


use Nemundo\Html\Document\HtmlDocument;
use Nemundo\Html\Listing\UnorderedList;
use Nemundo\User\Parameter\UsergroupParameter;
use Nemundo\Web\Site\AbstractSite;

class UsergroupIdentificationSite extends AbstractSite
{

    /**
     * @var UsergroupIdentificationSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'usergroup-identification';
        $this->menuActive = false;
    }

    protected function registerSite()
    {
        UsergroupIdentificationSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new HtmlDocument());

        $list = new UnorderedList($page);

        $usergroup = (new UsergroupParameter())->getUsergroup();
        foreach ($usergroup->getUserList() as $userRow) {

            $list->addText($userRow->displayName);

        }


        $page->render();

    }


}