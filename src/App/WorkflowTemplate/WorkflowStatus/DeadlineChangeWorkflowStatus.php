<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus;

use Nemundo\Workflow\App\WorkflowTemplate\Data\DeadlineChange\DeadlineChangeModel;
use Nemundo\Workflow\App\WorkflowTemplate\Data\DeadlineChange\DeadlineChangeReader;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;

class DeadlineChangeWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadData()
    {

        $this->objectName = 'Terminverschiebung';  // 'Deadline Change';
        $this->objectId = '03d66420-e86f-4f7c-95f6-352a41dc98f3';
        $this->modelClass = DeadlineChangeModel::class;
        $this->changeWorkflowStatus = false;
        $this->statusText = 'Termin wurde verschoben';

    }


    public function onCreate($dataId)
    {

        $row = (new DeadlineChangeReader())->getRowById($dataId);
        $this->changeDeadline($row->deadline);

    }

}