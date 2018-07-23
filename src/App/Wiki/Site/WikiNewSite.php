<?php

namespace Nemundo\Workflow\App\Wiki\Site;

use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Content\Factory\ContentTypeFactory;
use Nemundo\App\Content\Form\ContentModelForm;
use Nemundo\Core\Debug\Debug;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Model\Form\ModelForm;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Wiki\Action\WikiPageAction;
use Nemundo\Workflow\App\Wiki\Event\WikiEvent;
use Nemundo\Workflow\App\Wiki\Form\WikiForm;
use Nemundo\Workflow\App\Wiki\Parameter\WikiPageParameter;
use Nemundo\App\Content\Data\ContentType\ContentTypeReader;
use Nemundo\App\Content\Parameter\ContentTypeParameter;

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

        $pageParameter = new WikiPageParameter();

        //$contentTypeRow = (new ContentTypeReader())->getRowById($contentTypeId);


        //$contentType = $contentTypeRow->getContentTypeClassObject();


        $contentType = (new ContentTypeFactory())->getContentTypeByParameter();


        $title = new AdminTitle($page);
        $title->content = $contentType->name;


        $redirectSite = clone(WikiPageSite::$site);
        $redirectSite->addParameter($pageParameter);

        $event = new WikiEvent();
        $event->pageId = (new WikiPageParameter())->getValue();
        $event->contentType = $contentType;

        $form = $contentType->getForm($page);
        $form->afterSubmitEvent->addEvent($event);
        $form->redirectSite = $redirectSite;

        /*
        $event = new WikiEvent();
        $event->pageId = (new PageParameter())->getValue();
        $event->contentType = $contentType;

        $redirectSite = clone(WikiPageSite::$site);
        $redirectSite->addParameter($pageParameter);

        $form = $contentType->getForm($page);

        if ($form !== null) {

            $form->afterSubmitEvent->addEvent($event);
            $form->redirectSite = $redirectSite;

        } else {
            $event->run(null);
            $redirectSite->redirect();
        }
*/

        /*
        $form = new WikiForm($page);
        $form->contentType = $contentType;
        $form->pageId = (new PageParameter())->getValue();
        $form->redirectSite = clone(WikiPageSite::$site);*/
        //$form->redirectSite->addParameter($pageParameter);


        $page->render();


    }

}