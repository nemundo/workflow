<?php

namespace Nemundo\Workflow\Template\WorkflowStatus;

use Nemundo\Workflow\Action\DeadlineWorkflowAction;
use Nemundo\Workflow\App\WorkflowTemplate\Data\DeadlineChange\DeadlineChangeModel;
use Nemundo\Workflow\App\WorkflowTemplate\Data\DeadlineChange\DeadlineChangeReader;
use Nemundo\Workflow\Builder\StatusChangeEvent;
use Nemundo\Workflow\WorkflowStatus\AbstractDataWorkflowStatus;

class DeadlineChangeWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadData()
    {

        $this->name = 'Deadline Change';
        $this->id = '03d66420-e86f-4f7c-95f6-352a41dc98f3';
        $this->modelClass = DeadlineChangeModel::class;
        $this->changeWorkflowStatus = false;

    }


    public function onChange(StatusChangeEvent $changeEvent)
    {

        $row = (new DeadlineChangeReader())->getRowById($changeEvent->workflowItemId);

        (new DeadlineWorkflowAction($changeEvent))
            ->changeDeadline($row->deadline);

    }

}