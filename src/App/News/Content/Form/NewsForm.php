<?php

namespace Nemundo\Workflow\App\News\Content\Form;


use Nemundo\App\Content\Form\AbstractContentTreeForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Workflow\App\News\Content\Type\NewsContentType;

class NewsForm extends AbstractContentTreeForm
{

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
        $this->title->label = 'Title';

        $this->text = new BootstrapLargeTextBox($this);
        $this->text->label = 'Text';

        return parent::getHtml();

    }


    protected function onSubmit()
    {

        $type = new NewsContentType();
        $type->parentContentType = $this->parentContentType;
        $type->title = $this->title->getValue();
        $type->text = $this->text->getValue();
        $type->saveType();

    }

}