<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Item;


use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\LargeTextTemplateContentType;


class LargeTextContentView extends AbstractContentView
{

    /**
     * @var LargeTextTemplateContentType
     */
    public $contentType;

    public function getContent()
    {

        $p = new Paragraph($this);
        $p->content = $this->contentType->text;

        return parent::getContent();

    }

}