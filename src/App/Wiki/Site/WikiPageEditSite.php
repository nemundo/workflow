<?php

namespace Nemundo\Workflow\App\Wiki\Site;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Wiki\Content\Type\WikiPageContentType;
use Nemundo\Workflow\App\Wiki\Data\WikiContentType\WikiContentType;
use Nemundo\Workflow\App\Wiki\Parameter\WikiPageParameter;

class WikiPageEditSite extends AbstractSite
{

    /**
     * @var WikiPageEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'page-edit';

    }


    protected function registerSite()
    {
        WikiPageEditSite::$site = $this;

    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $wiki = new WikiPageContentType((new WikiPageParameter())->getValue());


        $title = new AdminTitle($page);
        $title->content = $wiki->getSubject();

        $form = $wiki->getFormUpdate($page);
        $form->updateId  = $wiki->dataId;

        $page->render();


    }

}