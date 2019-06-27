<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\View;


use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Workflow\App\WorkflowTemplate\Data\Comment\CommentReader;

class CommentWorkflowTemplateView extends AbstractContentView
{

    public function getContent()
    {

        $row = (new CommentReader())->getRowById($this->dataId);

        $p = new Paragraph($this);
        $p->content =$row->comment;  // (new Html($row->comment))->getValue();

        return parent::getContent();

    }

}