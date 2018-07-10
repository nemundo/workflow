<?php

namespace Nemundo\Workflow\App\Workflow\Setup;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\Workflow\App\Workflow\Data\WorkflowStatus\WorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class WorkflowStatusSetup extends AbstractBase
{

    public function addWorkflowStatus(AbstractWorkflowStatus $workflowStatus)
    {

        $data = new WorkflowStatus();
        $data->updateOnDuplicate = true;
        $data->id = $workflowStatus->id;
        $data->workflowStatus = $workflowStatus->name;
        $data->workflowStatusClass = $workflowStatus->getClassName();
        //$data->workflowStatusText = $workflowStatus->workflowStatusText;
        $data->save();

        $setup = new ContentTypeSetup();
        $setup->addContentType($workflowStatus);

    }

}