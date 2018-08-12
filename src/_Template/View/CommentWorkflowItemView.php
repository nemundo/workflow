<?php

namespace Nemundo\Workflow\Template\View;


use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Workflow\App\WorkflowTemplate\Data\Comment\CommentReader;
use Nemundo\Workflow\App\Workflow\Content\Item\AbstractWorkflowItemView;

class CommentWorkflowItemView extends AbstractWorkflowItemView
{

    public function getHtml()
    {

        $row = (new CommentReader())->getRowById($this->workflowItemId);

        $p = new Paragraph($this);
        $p->content = $row->comment;

        return parent::getHtml();

    }

}