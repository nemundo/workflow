<?php

namespace Nemundo\Workflow\App\Wiki\Site;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Design\Bootstrap\Navbar\BootstrapNavbar;
use Nemundo\Design\Bootstrap\Navigation\BootstrapNavigation;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Com\Html\Basic\Br;
use Nemundo\Com\Html\Basic\Hr;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Design\Bootstrap\Dropdown\BootstrapDropdown;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Workflow\App\Wiki\Collection\WikiContentTypeCollection;
use Nemundo\Workflow\App\Wiki\ContentItem\WikiContentItem;
use Nemundo\Workflow\App\Wiki\Data\Wiki\WikiReader;
use Nemundo\Workflow\App\Wiki\Data\WikiContentType\WikiContentTypeReader;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageReader;
use Nemundo\Workflow\App\Wiki\Parameter\PageParameter;
use Nemundo\App\Content\Parameter\ContentTypeParameter;



class WikiPageSite extends AbstractSite
{

    /**
     * @var WikiPageSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Wiki';
        $this->url = 'wiki-page';
        $this->menuActive = false;

        new WikiNewSite($this);

    }


    protected function registerSite()
    {
        WikiPageSite::$site= $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $pageParameter = new PageParameter();
        $pageId = $pageParameter->getValue();

        $pageRow = (new WikiPageReader())->getRowById($pageId);

        $nav = new BootstrapNavigation($page);
        $nav->site = WikiSite::$site;

        $title = new AdminTitle($page);
        $title->content = $pageRow->title;

        $dropdown = new BootstrapDropdown($page);

        $reader = new WikiContentTypeReader();
        foreach ($reader->getData() as $typeRow) {
            $site = clone(WikiNewSite::$site);
            $site->title = $typeRow->contentType;
            $site->addParameter(new ContentTypeParameter($typeRow->id));
            $site->addParameter($pageParameter);

            $dropdown->addSite($site);

        }


        $dropdown = new BootstrapDropdown($page);

        //$reader = new WikiContentTypeReader();
        foreach ((new WikiContentTypeCollection())->getContentTypeList() as $contentType) {

            $site = clone(WikiNewSite::$site);
            $site->title = $contentType->name;
            $site->addParameter(new ContentTypeParameter($contentType->id));
            $site->addParameter($pageParameter);

            $dropdown->addSite($site);

        }




        $item = new WikiContentItem($page);
        $item->dataId = $pageId;

        $page->render();

    }

}