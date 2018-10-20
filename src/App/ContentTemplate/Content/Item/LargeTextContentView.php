<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Item;


use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\LargeTextTemplateContentType;
use Nemundo\Workflow\App\ContentTemplate\Data\LargeText\LargeTextReader;

class LargeTextContentView extends AbstractContentView
{

    /**
     * @var LargeTextTemplateContentType
     */
    public $contentType;

    public function getHtml()
    {

        //$row = (new LargeTextReader())->getRowById($this->dataId);

        $p = new Paragraph($this);
        $p->content = $this->contentType->text;   // (new Html($row->text))->getValue();

        return parent::getHtml();
    }

}