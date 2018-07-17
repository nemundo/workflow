<?php

namespace Nemundo\Workflow\App\Workflow\Event;


use Nemundo\App\Content\Event\AbstractContentEvent;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowStatusChangeBuilder;

class WorkflowItemEvent extends AbstractContentEvent
{


    public function onCreate($dataId)
    {

        $builder = new WorkflowStatusChangeBuilder();
        $builder->workflowStatus = $this->workflowStatus;
        $builder->workflowId = $this->workflowId;
        $builder->workflowItemId = $workflowItemId;
        $builder->changeStatus();



    }


}