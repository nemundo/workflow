<?php

namespace Nemundo\Workflow\App\Survey\Site;

use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Content\Com\SequenceContentTypeDoc;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Reader\SequenceContentTypeReader;
use Nemundo\Core\Debug\Debug;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\Site;
use Nemundo\Workflow\App\Stream\Event\StreamEvent;
use Nemundo\Workflow\App\Survey\Content\Type\Survey1ContentType;
use Nemundo\Workflow\App\Survey\Content\Type\Survey3ContentType;
use Nemundo\Workflow\App\Survey\Parameter\SurveyParameter;

class SurveySite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Survey';
        $this->url = 'survey';
    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();



        $start = new Survey1ContentType();
        $start->getForm();





/*
        $event = new StreamEvent();
        $event->contentType = new Survey3ContentType();

        $form = (new Survey3ContentType())->getForm($page);
        $form->afterSubmitEvent->addEvent($event);



        /*
        $reader = new SequenceContentTypeReader();
        $reader->startContentType =  new Survey1ContentType();
        foreach ($reader->getData() as $contentType) {
            $btn = new AdminButton($page);
            $btn->content = $contentType->name;
            $btn->site = new Site();
            $btn->site->addParameter(new ContentTypeParameter($contentType->id));
        }

        $contentTypeParameter = new ContentTypeParameter();
        $contentType = new Survey1ContentType();
        if ($contentTypeParameter->exists()) {
            $contentType = $contentTypeParameter->getContentType();
        }


        $title = new AdminTitle($page);
        $title->content = $contentType->name;

        $form = $contentType->getForm($page);

        $nextContentType = $contentType->getNextContentType();

        if ($nextContentType !== null) {

            $form->redirectSite = new Site();
            $form->redirectSite->addParameter(new ContentTypeParameter($contentType->getNextContentType()->id));

            $form->redirectParameter = new SurveyParameter();


        }

        $doc = new SequenceContentTypeDoc($page);
        $doc->startContentType = new Survey1ContentType();
        $doc->currentContentType = $contentType;

        foreach ((new Survey1ContentType())->getFollowingContentTypeList() as $contentType) {

            $btn = new AdminButton($page);
            $btn->content = $contentType->name;
            $btn->site = new Site();
            $btn->site->addParameter(new ContentTypeParameter($contentType->id));

        }*/

        //(new Debug())->write($contentType->getNextContentType()->name);

        $page->render();


    }
}