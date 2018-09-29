<?php

namespace Nemundo\Workflow\App\News\Content\Form;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Workflow\App\News\Content\Type\BreakingNewsContentType;

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