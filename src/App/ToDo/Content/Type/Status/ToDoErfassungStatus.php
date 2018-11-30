<?php

namespace Nemundo\Workflow\App\ToDo\Content\Type\Status;


use Nemundo\Workflow\App\ToDo\Content\Form\ToDoTypeForm;
use Nemundo\Workflow\App\ToDo\Content\View\ToDoErfassungView;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;


class ToDoErfassungStatus extends AbstractWorkflowStatus
{

    /**
     * @var string
     */
    public $toDo;

    protected function loadType()
    {

        $this->contentLabel = 'Todo Erfassung';
        $this->contentId = '8053c883-b6ef-412a-97a4-172060adeb19';
        $this->subject = 'ToDo wurde erfasst';

        $this->formClass = ToDoTypeForm::class;
        $this->viewClass = ToDoErfassungView::class;
        $this->nextContentTypeClass = ToDoDoneStatus::class;

    }

}