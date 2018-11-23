<?php

namespace Nemundo\Workflow\App\Workflow\Content\View;


use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Com\Html\Basic\Paragraph;

class SubjectView extends AbstractContentView
{


    public function getHtml()
    {

        $p = new Paragraph($this);
        $p->content = $this->contentType->getSubject();

        return parent::getHtml();
    }

}