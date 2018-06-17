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

    protected function loadWorkflowStatus()
    {

        $this->workflowStatus = 'Kommentar';
        $this->workflowStatusId = '267c76a7-7bbf-4546-a20b-9fe20beee15f';
        $this->modelClassName = CommentModel::class;
        $this->changeWorkflowStatus = false;
        $this->workflowItemViewClassName = CommentWorkflowItemView::class;

    }


    public function onChange(StatusChangeEvent $changeEvent)
    {


        (new NotificationWorkflowAction($changeEvent))
            ->notificateUsergroup(new BetaUsergroup());


    }

}