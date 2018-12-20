<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Form\Comment;


use Nemundo\App\Content\Form\AbstractContentTreeForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Workflow\App\WorkflowTemplate\Content\Type\Comment\CommentTemplateStatus;

class CommentForm extends AbstractContentTreeForm
{

    /**
     * @var BootstrapLargeTextBox
     */
    public $comment;

    /**
     * @var CommentTemplateStatus
     */
    public $contentType;

    public function getHtml()
    {

        $this->comment = new BootstrapLargeTextBox($this);
        $this->comment->label = $this->contentType->commentLabel;  // 'Kommentar';
        $this->comment->validation = true;

        return parent::getHtml();
    }


    protected function onSubmit()
    {

        $this->contentType->parentContentType = $this->parentContentType;
        $this->contentType->comment = $this->comment->getValue();
        $this->contentType->saveType();

    }

}