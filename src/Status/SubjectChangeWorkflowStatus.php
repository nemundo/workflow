<?php

namespace Nemundo\Workflow\Status;


use Nemundo\Workflow\Data\SubjectChange\SubjectChangeModel;
use Nemundo\Workflow\Data\SubjectChange\SubjectChangeReader;
use Nemundo\Workflow\Data\Workflow\WorkflowUpdate;
use Nemundo\Workflow\WorkflowStatus\Form\SubjectChangeForm;
use Nemundo\Workflow\WorkflowStatus\Item\SubjectChangeItem;

class SubjectChangeWorkflowStatus extends AbstractWorkflowStatus
{

    protected function loadWorkflowStatus()
    {

        $this->status = 'Change Subject';
        $this->statusId = 'bea4e096-e356-4b07-886e-8c5533f052d5';
        $this->changeWorkflowStatus = false;

        $this->modelClassName = SubjectChangeModel::class;
        $this->formClassName = SubjectChangeForm::class;
        $this->workflowItemClassName = SubjectChangeItem::class;


    }


    public function onChange($workflowId, $workflowItemId = null)
    {

        $row = (new SubjectChangeReader())->getRowById($workflowItemId);

        $update = new WorkflowUpdate();
        $update->subject = $row->subject;
        $update->updateById($workflowId);


    }

}