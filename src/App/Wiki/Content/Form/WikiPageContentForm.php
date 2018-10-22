<?php

namespace Nemundo\Workflow\App\Wiki\Content\Form;


use Nemundo\App\Content\Form\ContentTreeForm;
use Nemundo\App\Content\Form\ContentTreeFormTrait;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Workflow\App\ContentTemplate\Content\Data\LargeTextTemplateContent;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\LargeTextTemplateContentType;
use Nemundo\Workflow\App\Wiki\Content\Type\WikiPageContentType;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPage;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageForm;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageReader;
use Nemundo\Workflow\App\Wiki\Event\WikiEvent;

class WikiPageContentForm extends ContentTreeForm  // BootstrapForm  // WikiPageForm
{

    public $updateId;


    //use ContentFormTrait;

    /**
     * @var BootstrapTextBox
     */
    private $title;

    /**
     * @var BootstrapLargeTextBox
     */
    private $text;


    public function getHtml()
    {

        $this->title = new BootstrapTextBox($this);
        $this->title->label = 'Wiki Titel';
        $this->title->autofocus = true;

        //$this->text = new BootstrapLargeTextBox($this);
        //$this->text->label = 'Text';

        if ($this->updateId !== null) {

            $row = (new WikiPageReader())->getRowById($this->updateId);

            $this->title->value = $row->title;


        }


        return parent::getHtml();
    }


    protected function onSubmit()
    {


/*
        $content = new WikiPageContentType($this->updateId);
        $content->title = $this->title->getValue();
        $content->saveType();*/


        $content = new WikiPageContentType();
        $content->title = $this->title->getValue();
        $content->saveType();




        //if ($this->redirectToContentItemSite) {
        $this->redirectSite = $content->getViewSite();
        //}


        //$this->checkContentItemRedirect();


        /*
        $data = new WikiPage();
        $data->title = $this->title->getValue();
        $pageId = $data->save();

        $contentType = new WikiPageContentType();
        $contentType->onCreate($pageId);

        $content = new LargeTextTemplateContent();
        $content->text = $this->text->getValue();
        $id = $content->save();

        $event = new WikiEvent();
        $event->contentType = new LargeTextTemplateContentType();
        $event->pageId = $pageId;
        $event->run($id);


        $this->afterSubmitEvent->run($pageId);*/


        //return $pageId;

    }

}