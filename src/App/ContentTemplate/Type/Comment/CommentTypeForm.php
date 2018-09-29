<?php

namespace Nemundo\Workflow\App\ContentTemplate\Type\Comment;


use Nemundo\App\Content\Form\ContentTreeForm;
use Nemundo\Core\Debug\Debug;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Workflow\App\ContentTemplate\Data\Comment\CommentReader;

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


        if ($this->contentType->dataId !== null) {

            //(new Debug())->write($this->contentType->dataId);

            $row = (new CommentReader())->getRowById($this->contentType->dataId);

            $this->comment->value = $row->comment;


        }


        return parent::getHtml();

    }


    protected function onSubmit()
    {


        $dataId = null;
        if ($this->contentType->dataId !== null) {
            $dataId = $this->contentType->dataId;
        }

        //(new Debug())->write($this->contentType);

        //exit;

        $type = new CommentType($dataId);
        $type->parentContentType = $this->parentContentType;
        $type->comment = $this->comment->getValue();
        $type->saveType();

    }

}