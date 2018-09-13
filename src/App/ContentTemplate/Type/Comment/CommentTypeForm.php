<?php

namespace Nemundo\Workflow\App\ContentTemplate\Type\Comment;


use Nemundo\App\Content\Form\ContentTreeForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;

class CommentTypeForm extends ContentTreeForm
{

    /**
     * @var BootstrapLargeTextBox
     */
    private $comment;

    public function getHtml()
    {

        $this->comment = new BootstrapLargeTextBox($this);
        $this->comment->label = 'Kommentar';
        $this->comment->autofocus = true;

        return parent::getHtml();

    }


    protected function onSubmit()
    {

        $type = new CommentType();
        $type->parentContentType = $this->parentContentType;
        $type->comment = $this->comment->getValue();
        $type->saveItem();

    }

}