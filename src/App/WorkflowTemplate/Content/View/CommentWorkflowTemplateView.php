<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\View;


use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Html\Block\ContentDiv;
use Nemundo\Workflow\App\WorkflowTemplate\Data\Comment\CommentReader;

class CommentWorkflowTemplateView extends AbstractContentView
{

    public function getContent()
    {

        $row = (new CommentReader())->getRowById($this->dataId);

        $div = new ContentDiv($this);
        $div->content = $row->comment;

        return parent::getContent();

    }

}