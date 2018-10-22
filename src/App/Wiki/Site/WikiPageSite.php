<?php

namespace Nemundo\Workflow\App\Wiki\Site;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Content\Com\ContentTypeCollectionDropdown;
use Nemundo\App\Workflow\Com\WorkflowMenuDropdown;
use Nemundo\Package\Bootstrap\Navbar\BootstrapNavbar;
use Nemundo\Package\Bootstrap\Navigation\BootstrapNavigation;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Com\Html\Basic\Br;
use Nemundo\Com\Html\Basic\Hr;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Dropdown\BootstrapDropdown;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\ImageTemplateContentType;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\LargeTextTemplateContentType;
use Nemundo\Workflow\App\Wiki\Collection\WikiContentTypeCollection;
use Nemundo\Workflow\App\Wiki\Content\Type\WikiPageContentType;
use Nemundo\Workflow\App\Wiki\ContentItem\WikiContentView;
use Nemundo\Workflow\App\Wiki\Data\Wiki\WikiReader;
use Nemundo\Workflow\App\Wiki\Data\WikiContentType\WikiContentTypeReader;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageReader;
use Nemundo\Workflow\App\Wiki\Parameter\WikiPageParameter;
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


        $nav = new BootstrapNavigation($page);
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