<?php

namespace Nemundo\Workflow\App\Survey\Content\Form;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Paragraph;

class Survey1ContentForm extends AbstractHtmlContainerList
{

    public function getHtml()
    {

        $p = new Paragraph($this);
        $p->content = 'Survey1';

        $p = new Paragraph($this);
        $p->content = 'Survey1';
        $p = new Paragraph($this);
        $p->content = 'Survey1';
        $p = new Paragraph($this);
        $p->content = 'Survey1';$p = new Paragraph($this);
        $p->content = 'Survey1';

        return parent::getHtml();

    }

}