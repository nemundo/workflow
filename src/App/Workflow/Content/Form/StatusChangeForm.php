<?php

namespace Nemundo\Workflow\App\Workflow\Content\Form;

use Nemundo\App\Content\Form\AbstractContentTreeForm;
use Nemundo\Core\Language\Translation;
use Nemundo\Html\Paragraph\Paragraph;

class StatusChangeForm extends AbstractContentTreeForm
{

    public function getContent()
    {

        $p = new Paragraph($this);
        $p->content = 'Folgende Aktion ausführen: ' . (new Translation())->getText( $this->contentType->contentLabel);

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $status = clone($this->contentType);
        $status->parentContentType = $this->parentContentType;
        $status->saveType();

    }

}