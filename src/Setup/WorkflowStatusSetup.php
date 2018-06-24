<?php

namespace Nemundo\Workflow\Setup;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\Data\WorkflowStatus\WorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class WorkflowStatusSetup extends AbstractBase
{

    public function addWorkflowStatus(AbstractWorkflowStatus $workflowStatus)
    {

        $data = new WorkflowStatus();
        $data->updateOnDuplicate = true;
        $data->id = $workflowStatus->workflowStatusId;
        $data->workflowStatus = $workflowStatus->workflowStatus;
        $data->workflowStatusClass = $workflowStatus->getClassName();
        //$data->workflowStatusText = $workflowStatus->workflowStatusText;
        $data->save();

    }


}