<?php

namespace Nemundo\Workflow\App\Workflow\Content\View;


use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Html\Paragraph\Paragraph;

class SubjectView extends AbstractContentView
{

    public function getContent()
    {

        $p = new Paragraph($this);
        $p->content = $this->contentType->getSubject();

        return parent::getContent();
    }

}