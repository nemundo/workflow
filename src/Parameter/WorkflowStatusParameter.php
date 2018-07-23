<?php

namespace Nemundo\Workflow\Parameter;

use Nemundo\App\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
use Nemundo\Workflow\App\Workflow\Data\WorkflowStatus\WorkflowStatusReader;

class WorkflowStatusParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'workflow-status';
    }


    public function getWorkflowStatus()
    {

        $row = (new ContentTypeReader())->getRowById($this->getValue());
        $workflowStatus = $row->getContentTypeClassObject();
        return $workflowStatus;

    }

}