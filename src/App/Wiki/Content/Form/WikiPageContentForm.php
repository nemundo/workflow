<?php

namespace Nemundo\Workflow\App\Wiki\Content\Form;


use Nemundo\App\Content\Form\ContentFormTrait;
use Nemundo\Design\Bootstrap\Form\BootstrapForm;
use Nemundo\Design\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Design\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Workflow\App\ContentTemplate\Content\Data\LargeTextTemplateContent;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\LargeTextTemplateContentType;
use Nemundo\Workflow\App\Wiki\Content\Type\WikiPageContentType;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPage;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageForm;
use Nemundo\Workflow\App\Wiki\Event\WikiEvent;

class WikiPageContentForm extends BootstrapForm  // WikiPageForm
{

    use ContentFormTrait;

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
        $this->title->label = 'Der Titel';

        $this->text = new BootstrapLargeTextBox($this);
        $this->text->label = 'Text';


        return parent::getHtml();
    }


    protected function onSubmit()
    {

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


        $this->afterSubmitEvent->run($pageId);


        return $pageId;

    }

}