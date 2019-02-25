<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\View;


use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Html\Basic\Paragraph;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Workflow\App\WorkflowTemplate\Data\Comment\CommentReader;

class CommentWorkflowTemplateView extends AbstractContentView
{

    public function getHtml()
    {

        $row = (new CommentReader())->getRowById($this->dataId);

        $p = new Paragraph($this);
        $p->content = (new Html($row->comment))->getValue();

        return parent::getHtml();

    }

}