<?php

namespace Nemundo\Workflow\App\Workflow\Content\Form;


use Nemundo\App\Content\Form\AbstractContentTreeForm;
use Nemundo\Html\Paragraph\Paragraph;


class StatusChangeForm extends AbstractContentTreeForm
{

    public function getHtml()
    {

        $p = new Paragraph($this);
        $p->content = 'Folgende Aktion ausführen: ' . $this->contentType->contentLabel;

        return parent::getHtml();

    }


    protected function onSubmit()
    {

        $status = clone($this->contentType);
        $status->parentContentType = $this->parentContentType;
        $status->saveType();

    }

}