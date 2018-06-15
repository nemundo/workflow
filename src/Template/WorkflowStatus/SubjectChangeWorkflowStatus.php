<?php

namespace Nemundo\Workflow\Template\WorkflowStatus;

use Nemundo\Workflow\Action\SubjectWorkflowAction;
use Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange\SubjectChangeModel;
use Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange\SubjectChangeReader;
use Nemundo\Workflow\Builder\StatusChangeEvent;
use Nemundo\Workflow\WorkflowStatus\Form\SubjectChangeForm;
use Nemundo\Workflow\WorkflowStatus\Item\SubjectChangeItem;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class SubjectChangeWorkflowStatus extends AbstractWorkflowStatus
{

    protected function loadWorkflowStatus()
    {

        $this->workflowStatus = 'Change Subject';
        $this->workflowStatusId = 'bea4e096-e356-4b07-886e-8c5533f052d5';
        $this->changeWorkflowStatus = false;

        //$this->modelClassName = SubjectChangeModel::class;
        //$this->formClassName = SubjectChangeForm::class;
        $this->workflowItemViewClassName = SubjectChangeItem::class;


    }


    public function onChange(StatusChangeEvent $changeEvent)
    {

        $row = (new SubjectChangeReader())->getRowById($changeEvent->workflowItemId);

        (new SubjectWorkflowAction($changeEvent))
            ->changeSubject($row->subject);

    }

}