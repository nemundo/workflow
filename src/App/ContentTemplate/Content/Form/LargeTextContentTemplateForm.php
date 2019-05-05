<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Form;


use Nemundo\App\Content\Form\AbstractContentTreeForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\LargeTextTemplateContentType;

class LargeTextContentTemplateForm extends AbstractContentTreeForm
{

    /**
     * @var LargeTextTemplateContentType
     */
    public $contentType;


    /**
     * @var BootstrapLargeTextBox
     */
    private $text;

    public function getContent()
    {

        $this->text = new BootstrapLargeTextBox($this);
        $this->text->label = $this->contentType->largeTextLabel;

        return parent::getContent();
    }


    protected function onSubmit()
    {

        $this->contentType->text = $this->text->getValue();
        $this->contentType->saveType();

    }


}