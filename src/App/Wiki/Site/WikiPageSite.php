<?php

namespace Nemundo\Workflow\App\Wiki\Site;


use Nemundo\Admin\Com\Title\AdminTitle;
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

        $title = new AdminTitle($page);
        $title->content = $pageRow->title;




        $dropdown = new BootstrapDropdown($page);
        foreach ((new WikiContentTypeCollection())->getContentTypeList() as $contentType) {

            $site = clone(WikiNewSite::$site);
            $site->title = $contentType->name;
            $site->addParameter(new ContentTypeParameter($contentType->id));
            $site->addParameter($pageParameter);


            $dropdown->addSite($site);

        }


        $item = new WikiContentItem($page);
        $item->dataId = $pageId;


        /*
        $wikiReader = new WikiReader();
        $wikiReader->filter->andEqual($wikiReader->model->pageId, $pageId);
        $wikiReader->addOrder($wikiReader->model->id, SortOrder::DESCENDING);

        foreach ($wikiReader->getData() as $wikiRow) {

            $contentType = $wikiRow->contentType->getContentTypeClassObject();

            $item = $contentType->getItem($page);
            $item->dataId = $wikiRow->dataId;

            (new Hr($page));

        }*/




        $page->render();

    }

}