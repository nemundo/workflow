<?php

namespace Nemundo\Workflow\App\Wiki\Site;

use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Core\Debug\Debug;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Wiki\Action\WikiPageAction;
use Nemundo\Workflow\App\Wiki\Data\Wiki\WikiReader;
use Nemundo\Workflow\App\Wiki\Event\WikiEvent;
use Nemundo\Workflow\App\Wiki\Form\WikiForm;
use Nemundo\Workflow\App\Wiki\Parameter\WikiPageParameter;
use Nemundo\App\Content\Data\ContentType\ContentTypeReader;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\Workflow\App\Wiki\Parameter\WikiItemParameter;

class WikiEditSite extends AbstractSite
{

    /**
     * @var WikiEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'edit';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        WikiEditSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $wikiItemId = (new WikiItemParameter())->getValue();

        $reader = new WikiReader();
        $reader->model->loadContentType();
        $wikiRow = $reader->getRowById($wikiItemId);


        $contentType = $wikiRow->contentType->getContentTypeClassObject();


        $title = new AdminTitle($page);
        $title->content =  $contentType->contentLabel;

        $form = $contentType->getFormUpdate($page);
        $form->updateId = $wikiRow->dataId;
$form->redirectSite = clone(WikiPageSite::$site);
$form->redirectSite->addParameter(new WikiPageParameter($wikiRow->pageId));



        /*
        $contentTypeId = (new ContentTypeParameter())->getValue();


        $pageParameter = new PageParameter();

        $contentTypeRow = (new ContentTypeReader())->getRowById($contentTypeId);
        $contentType = $contentTypeRow->getContentTypeClassObject();

        $title = new AdminTitle($page);
        $title->content = $contentType->name;



        /*
        $event = new WikiEvent();
        $event->pageId = (new PageParameter())->getValue();
        $event->contentType = $contentType;

        $form = $contentType->getForm($page);
        $form->afterSubmitEvent = $event;
        $form->redirectSite = clone(WikiPageSite::$site);
        $form->redirectSite->addParameter($pageParameter);*/



        /*
        $form = new WikiForm($page);
        $form->contentType = $contentType;
        $form->pageId = (new PageParameter())->getValue();
        $form->redirectSite = clone(WikiPageSite::$site);*/
        //$form->redirectSite->addParameter($pageParameter);



        $page->render();


    }

}