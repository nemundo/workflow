<?php

namespace Nemundo\Workflow\App\Wiki\Site;

use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\App\Content\Data\ContentTree\ContentTreeReader;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Wiki\Action\WikiPageAction;
use Nemundo\Workflow\App\Wiki\Data\Wiki\WikiReader;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageForm;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageReader;
use Nemundo\Workflow\App\Wiki\Parameter\WikiPageParameter;

class WikiSite extends AbstractSite
{

    /**
     * @var WikiSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Wiki';
        $this->url = 'wiki';

        new WikiNewSite($this);
        new WikiPageSite($this);
        new WikiRedirectSite($this);
        new WikiEditSite($this);
        new WikiItemDeleteSite($this);


    }


    protected function registerSite()
    {
        WikiSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $btn = new AdminButton($page);
        $btn->content = 'New';
        $btn->site = WikiNewSite::$site;


        //$form = new WikiPageForm($page);
        //$form->model->action->addInsertAction(new WikiPageAction());

        //$form = new WikiPageContentForm($page);

        //(new WikiPageContentType())->getForm($page);


        $list = new BootstrapHyperlinkList($page);

        $pageReader = new WikiPageReader();
        $pageReader->addOrder($pageReader->model->title);
        foreach ($pageReader->getData() as $pageRow) {
            $site = clone(WikiPageSite::$site);
            $site->title = $pageRow->title . ' (' . $pageRow->count . ') ' . $pageRow->url;
            $site->addParameter(new WikiPageParameter($pageRow->id));
            $list->addSite($site);
        }


        /*
        $treeReader = new ContentTreeReader();
        $treeReader->filter->andEqual($treeReader->model->contentTypeId, (new WikiPageContentType())->id);

        foreach ($treeReader->getData() as $treeRow) {
            //(new Debug())->write($treeRow->dataId);

            $item = (new WikiPageContentType())->getItem($page);
            $item->dataId = $treeRow->dataId;


        }*/


        $page->render();


    }
}