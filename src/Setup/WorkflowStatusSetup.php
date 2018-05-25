<?php

namespace Nemundo\Workflow\Setup;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\Data\WorkflowStatus\WorkflowStatus;
use Nemundo\Workflow\Status\AbstractWorkflowStatus;

class WorkflowStatusSetup extends AbstractBase
{

    public function addWorkflowStatus(AbstractWorkflowStatus $workflowStatus)
    {

        $data = new WorkflowStatus();
        $data->updateOnDuplicate = true;
        $data->id = $workflowStatus->statusId;
        $data->workflowStatus = $workflowStatus->statusLabel;
        $data->workflowStatusClass = $workflowStatus->getClassName();
        $data->save();

    }


}