<?php

namespace Nemundo\Workflow\Factory;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;

class WorkflowDataId extends AbstractBase
{

    public function getDataId($workflowId)
    {

        $row = (new WorkflowReader())->getRowById($workflowId);
        return $row->dataId;

    }


    public function getDataIdFromWorkflowParameter()
    {

        $workflowId = (new WorkflowParameter())->getValue();
        return $this->getDataId($workflowId);


    }


}