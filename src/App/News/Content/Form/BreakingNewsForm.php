<?php

namespace Nemundo\Workflow\App\News\Content\Form;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Paragraph;

class BreakingNewsForm extends AbstractHtmlContainerList
{


    public function getHtml()
    {

        $p = new Paragraph($this);
        $p->content = 'breaking news';

        //$btn = new Bootstrap

        return parent::getHtml();

    }


    /*
    protected function onSubmit()
    {

        (new BreakingNewsContentType())->onCreate(null);


    }*/


}