<?php

namespace Nemundo\Workflow\App\Wiki\Site;

use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Com\Html\Basic\Br;
use Nemundo\Com\Html\Basic\Hr;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Design\Bootstrap\Dropdown\BootstrapDropdown;
use Nemundo\Design\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Wiki\Action\WikiPageAction;
use Nemundo\Workflow\App\Wiki\Collection\WikiContentTypeCollection;
use Nemundo\Workflow\App\Wiki\Data\Wiki\WikiReader;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageForm;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageReader;
use Nemundo\Workflow\App\Wiki\Parameter\PageParameter;
use Nemundo\App\Content\Parameter\ContentTypeParameter;

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

    }


    protected function registerSite()
    {
        WikiSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $form = new WikiPageForm($page);
        $form->model->action->addInsertAction(new WikiPageAction());


        $list = new BootstrapHyperlinkList($page);

        $pageReader = new WikiPageReader();
        $pageReader->addOrder($pageReader->model->title);
        foreach ($pageReader->getData() as $pageRow) {
            $site = clone(WikiPageSite::$site);
            $site->title = $pageRow->title;
            $site->addParameter(new PageParameter($pageRow->id));
            $list->addSite($site);
        }


        $page->render();


    }
}