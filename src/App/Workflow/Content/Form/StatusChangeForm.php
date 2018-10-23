<?php

namespace Nemundo\Workflow\App\Workflow\Content\Form;


use Nemundo\App\Content\Form\ContentTreeForm;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Core\Debug\Debug;
use Paranautik\App\VideoWorkflow\Content\Type\Status\VideoPublishStatus;

class StatusChangeForm extends ContentTreeForm
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