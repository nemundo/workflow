<?php

namespace Nemundo\Workflow\Template\WorkflowStatus;


use Nemundo\Workflow\App\WorkflowTemplate\Data\Comment\CommentModel;
use Nemundo\Workflow\WorkflowStatus\AbstractDataWorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class CommentWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadWorkflowStatus()
    {

        $this->workflowStatus = 'Kommentar';
        $this->workflowStatusId = '267c76a7-7bbf-4546-a20b-9fe20beee15f';
        $this->modelClassName = CommentModel::class;
        $this->changeWorkflowStatus = false;

    }

}