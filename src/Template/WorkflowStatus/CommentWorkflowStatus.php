<?php

namespace Nemundo\Workflow\Template\WorkflowStatus;


use Nemundo\Workflow\Action\NotificationWorkflowAction;
use Nemundo\Workflow\App\WorkflowTemplate\Data\Comment\CommentModel;
use Nemundo\Workflow\Builder\StatusChangeEvent;
use Nemundo\Workflow\Template\View\CommentWorkflowItemView;
use Nemundo\Workflow\WorkflowStatus\AbstractDataWorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;
use Paranautik\Usergroup\BetaUsergroup;

class CommentWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadType()
    {

        $this->name = 'Kommentar';
        $this->id = '267c76a7-7bbf-4546-a20b-9fe20beee15f';
        $this->modelClassName = CommentModel::class;
        $this->changeWorkflowStatus = false;
        $this->itemClass = CommentWorkflowItemView::class;

    }


}