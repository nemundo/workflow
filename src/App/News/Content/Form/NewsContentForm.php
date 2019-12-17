<?php

namespace Nemundo\Workflow\App\News\Content\Form;


use Nemundo\App\Content\Form\AbstractContentTreeForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Workflow\App\News\Content\Type\NewsContentType;

class NewsContentForm extends AbstractContentTreeForm
{

    /**
     * @var BootstrapTextBox
     */
    private $newsTitle;

    /**
     * @var BootstrapLargeTextBox
     */
    private $text;

    public function getContent()
    {

        $this->title = new BootstrapTextBox($this);
        $this->title->label = 'Title';

        $this->text = new BootstrapLargeTextBox($this);
        $this->text->label = 'Text';

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $type = new NewsContentType();
        $type->parentContentType = $this->parentContentType;
        $type->title = $this->newsTitle->getValue();
        $type->text = $this->text->getValue();
        $type->saveType();

    }

}