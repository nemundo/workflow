<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Type;


use Nemundo\App\Content\Type\Workflow\AbstractModelDataWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\Data\Comment\CommentModel;

class CommentTemplateWorkflowStatus extends AbstractModelDataWorkflowStatus
{

    protected function loadData()
    {

        $this->contentName = 'Comment (Template)';
        $this->contentId = '9fc81c7a-1fe8-4b8d-aa52-5a9f60431330';
        $this->modelClass = CommentModel::class;
        $this->changeStatus = false;

    }


    public function onCreate()
    {

        $this->saveContentLog();

    }

}