<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Form;


use Nemundo\App\Content\Form\ContentTreeForm;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Workflow\App\ContentTemplate\Content\Data\LargeTextTemplateContent;

class LargeTextContentTemplateForm extends BootstrapForm
{

    /**
     * @var BootstrapLargeTextBox
     */
    private $text;

    public function getHtml()
    {

        $this->text = new BootstrapLargeTextBox($this);
        $this->text->label = 'Text';
        $this->text->autofocus = true;

        return parent::getHtml();
    }


    protected function onSubmit()
    {

        $content = new LargeTextTemplateContent();
        $content->parentId = $this->parentId;
        $content->text = $this->text->getValue();
        $dataId = $content->save();

        //$this->runAfterSubmitEvent($dataId);

    }


}