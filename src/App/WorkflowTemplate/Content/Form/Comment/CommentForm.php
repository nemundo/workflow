<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Form\Comment;


use Nemundo\App\Content\Form\ContentTreeForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Workflow\App\WorkflowTemplate\Content\Type\Comment\CommentTemplateStatus;

class CommentForm extends ContentTreeForm
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
        $this->comment->label = 'Kommentar';

        return parent::getHtml();
    }


    protected function onSubmit()
    {

        /*
        $status = new CommentTemplateStatus();
        $status->parentContentType = $this->parentContentType;
        $status->comment = $this->comment->getValue();
        $status->saveType();*/

        $this->contentType->parentContentType = $this->parentContentType;
        $this->contentType->comment =  $this->comment->getValue();
        $this->contentType->saveType();



    }

}