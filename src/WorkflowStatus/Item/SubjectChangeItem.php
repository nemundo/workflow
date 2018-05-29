<?php

namespace Nemundo\Workflow\WorkflowStatus\Item;


use Nemundo\Com\Html\Basic\Bold;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Workflow\Com\WorkflowItem;
use Nemundo\Workflow\Data\SubjectChange\SubjectChangeReader;

class SubjectChangeItem extends WorkflowItem
{

    public function getHtml()
    {

        $row = (new SubjectChangeReader())->getRowById($this->workflowItemId);

        $bold = new Bold();
        $bold->content = $row->subject;

        $p = new Paragraph($this);
        $p->content = 'Subject was changed to ' . $bold->getHtmlString();

        return parent::getHtml();

    }

}