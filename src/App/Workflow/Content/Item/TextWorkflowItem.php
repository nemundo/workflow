<?php

namespace Nemundo\Workflow\App\Workflow\Content\Item;


use Nemundo\Com\Html\Basic\Paragraph;

class TextWorkflowItem //extends WorkflowItem
{

    /**
     * @var string
     */
    public $itemText;

    public function getHtml()
    {

        $p = new Paragraph($this);
        $p->content = $this->itemText;

        return parent::getHtml();

    }

}