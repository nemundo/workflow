<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\View;


use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Html\Basic\Paragraph;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\YouTubeType;

class YouTubeView extends AbstractContentView
{

    /**
     * @var YouTubeType
     */
    public $contentType;

    public function getHtml()
    {


        $p = new Paragraph($this);
        $p->content = 'video: '.$this->contentType->youTubeUrl;



        return parent::getHtml();
    }

}