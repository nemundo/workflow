<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Form;


use Nemundo\App\Content\Form\ContentForm;
use Nemundo\App\Content\Form\ContentTreeFormTrait;
use Nemundo\App\Content\Form\ContentTreeForm;
use Nemundo\Core\Debug\Debug;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Workflow\App\ContentTemplate\Content\Data\LargeTextTemplateContent;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\LargeTextTemplateContentType;

class LargeTextContentTemplateForm extends ContentTreeForm  // BootstrapForm
{

    //use ContentTreeFormTrait;

    /**
     * @var LargeTextTemplateContentType
     */
    public $contentType;


    /**
     * @var BootstrapLargeTextBox
     */
    private $text;

    public function getHtml()
    {

        $this->text = new BootstrapLargeTextBox($this);
        $this->text->label = $this->contentType->largeTextLabel;  // 'Text';
        //$this->text->autofocus = true;

        return parent::getHtml();
    }


    protected function onSubmit()
    {

        //(new Debug())->write($this->contentType);

        $this->contentType->text = $this->text->getValue();
        $this->contentType->saveType();

      /*  $content = new LargeTextTemplateContentType();
        $content->parentContentType = $this->parentContentType;
        $content->text = $this->text->getValue();
        $content->saveType();

        /*
        $content = new LargeTextTemplateContent();
        $content->parentId = $this->parentId;
        $content->text = $this->text->getValue();
        $dataId = $content->save();*/

        //$this->runAfterSubmitEvent($dataId);

    }


}