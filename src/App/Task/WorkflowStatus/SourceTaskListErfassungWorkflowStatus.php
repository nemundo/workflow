<?php

namespace Nemundo\Workflow\App\Task\WorkflowStatus;


use Nemundo\Workflow\App\Task\Data\SourceTask\SourceTaskReader;
use Nemundo\Workflow\App\Task\Data\Task\TaskModel;
use Nemundo\Workflow\App\Task\Data\Task\TaskReader;
use Nemundo\Workflow\App\Task\Data\Task\TaskUpdate;
use Nemundo\Workflow\App\Task\Form\SourceTaskContentForm;
use Nemundo\Workflow\App\Task\Form\TaskBuilderForm;
use Nemundo\Workflow\App\Task\Item\SourceTaskContentView;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;

class SourceTaskListErfassungWorkflowStatus extends AbstractWorkflowStatus
{

    protected function loadData()
    {

        $this->contentName = 'Source Aufgabe Liste Erfassung';
        $this->statusText = 'Aufgaben Liste wurde erfasst';
        $this->contentId = '34ec3aa8-3419-4c1b-a313-8c017225e6e6';
        //$this->modelClass = TaskModel::class;
        $this->formClass = SourceTaskContentForm::class;
        $this->viewClass = SourceTaskContentView::class;

        //$this->changeWorkflowStatus = false;
        $this->draftMode = true;

        //$this->addFollowingContentTypeClass(TaskCommentWorkflowStatus::class);
        //$this->addFollowingContentTypeClass(TaskDoneWorkflowStatus::class);

    }


    public function onCreate($dataId)
    {

        /*
                $taskRow = (new SourceTaskReader())->getRowById($dataId);
                $subject = $taskRow->task;

                $this->changeSubject($subject);


                /*
                $update = new TaskUpdate();
                $update->workflowId = $dataId;
                $update->updateById($dataId);


                $taskRow = (new TaskReader())->getRowById($dataId);
                $subject = $taskRow->task;

                $this->assignUser($taskRow->identificationId);
                //$this->createUserTask($taskRow->responsibleUserId,$personalTaskRow->deadline);*/
        //$this->changeDeadline($taskRow->deadline);
        //$this->changeSubject($subject);

    }

}