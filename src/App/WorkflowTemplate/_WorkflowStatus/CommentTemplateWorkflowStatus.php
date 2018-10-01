<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus;


use Nemundo\Workflow\App\WorkflowTemplate\Data\Comment\CommentModel;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractModelDataWorkflowStatus;


class CommentTemplateWorkflowStatus extends AbstractModelDataWorkflowStatus
{

    protected function loadData()
    {

        $this->contentName = 'Kommentar';
        $this->contentId = '267c76a7-7bbf-4546-a20b-9fe20beee15f';
        $this->modelClass = CommentModel::class;
        $this->changeWorkflowStatus = false;
        //$this->itemClass = CommentWorkflowItemView::class;

    }


    public function onCreate($dataId)
    {

        //$this->createUserInbox((new UserInformation())->getUserId(), 'Neuer Kommentar');


    }


}