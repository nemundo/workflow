<?php

namespace Nemundo\Workflow\App\Wiki\Site;

use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Wiki\Action\WikiPageAction;
use Nemundo\Workflow\App\Wiki\Form\WikiForm;
use Nemundo\Workflow\App\Wiki\Parameter\PageParameter;
use Nemundo\Workflow\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Workflow\Content\Parameter\ContentTypeParameter;

class WikiNewSite extends AbstractSite
{

    /**
     * @var WikiNewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'WikiNew';
        $this->url = 'wiki-new';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        WikiNewSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $contentTypeId = (new ContentTypeParameter())->getValue();

        $contentTypeRow = (new ContentTypeReader())->getRowById($contentTypeId);
        $contentType = $contentTypeRow->getContentTypeClassObject();


        $title = new AdminTitle($page);
        $title->content = $contentType->name;

        //$form = $contentType->getForm($page);

        $pageParameter = new PageParameter();

        $form = new WikiForm($page);
        $form->contentType = $contentType;
        $form->pageId = (new PageParameter())->getValue();
        $form->redirectSite = clone(WikiPageSite::$site);
        $form->redirectSite->addParameter($pageParameter);



        $page->render();


    }

}