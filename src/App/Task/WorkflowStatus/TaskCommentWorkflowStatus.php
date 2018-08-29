<?php

namespace Nemundo\Workflow\App\Task\WorkflowStatus;


use Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus\CommentTemplateWorkflowStatus;
use Schleuniger\Usergroup\SchleunigerUsergroup;


class TaskCommentWorkflowStatus extends CommentTemplateWorkflowStatus
{

    protected function loadData()
    {

        parent::loadData();

        $this->name = 'Kommentar (Task)';
        $this->statusText = 'Aufgabe wurde kommentiert';
        $this->id = '87e2769c-88c7-433d-975e-d8319efd03b5';
        //$this->modelClass = CommentMod CommentModel::class;
        //$this->changeWorkflowStatus = false;
        //$this->workflowItemClassName = WorkflowItem::class;

        //$this->addFollowingContentTypeClass(ProzesssteuerungTaskDoneWorkflowStatus::class);
        //$this->addFollowingContentTypeClass(CommentTaskWorkflowStatus::class);


    }



    public function onCreate($dataId)
    {

        $this->createUsergroupInbox(new SchleunigerUsergroup());

        // get list, inform all


    }




}