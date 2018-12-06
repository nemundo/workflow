<?php

namespace Nemundo\Workflow\App\Wiki\Site;


use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\App\Content\Com\ContentTypeCollectionDropdown;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Workflow\Com\WorkflowMenuDropdown;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Navigation\BootstrapNavigation;
use Nemundo\Package\Bootstrap\Tabs\BootstrapSiteTabs;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Wiki\Collection\WikiContentTypeCollection;
use Nemundo\Workflow\App\Wiki\Content\Type\WikiPageContentType;
use Nemundo\Workflow\App\Wiki\Data\Wiki\WikiReader;
use Nemundo\Workflow\App\Wiki\Data\WikiContentType\WikiContentTypeReader;
use Nemundo\Workflow\App\Wiki\Parameter\WikiPageParameter;


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
        new WikiPageEditSite($this);

    }


    protected function registerSite()
    {
        WikiPageSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $pageParameter = new WikiPageParameter();
        $pageId = $pageParameter->getValue();


        $nav = new BootstrapSiteTabs($page);
        $nav->site = WikiSite::$site;

        $btn = new AdminButton($page);
        $btn->content = 'edit';
        $btn->site = WikiPageEditSite::$site;
        $btn->site->addParameter($pageParameter);


        $wikiPage = new WikiPageContentType($pageId);
        $wikiPage->getView($page);

        $dropdown = new ContentTypeCollectionDropdown($page);
        $dropdown->contentTypeCollection = new WikiContentTypeCollection();
        $dropdown->redirectSite = WikiPageSite::$site;
        $dropdown->redirectSite->addParameter($pageParameter);


        $contentTypeParameter = new ContentTypeParameter();
        $contentType = $contentTypeParameter->getContentType();
        if ($contentType !== null) {


            $btn = new AdminButton($page);
            $btn->content = 'Back';
            $btn->site = $wikiPage->getViewSite();

            $contentType->parentContentType = $wikiPage;
            $form = $contentType->getForm($page);
            $form->redirectSite = $wikiPage->getViewSite();

        }


        $page->render();

    }

}