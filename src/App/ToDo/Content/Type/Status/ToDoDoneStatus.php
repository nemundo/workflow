<?php

namespace Nemundo\Workflow\App\ToDo\Content\Type\Status;


use Nemundo\Workflow\App\Workflow\Content\Type\AbstractStatusChangeWorkflowStaus;

class ToDoDoneStatus extends AbstractStatusChangeWorkflowStaus
{

    protected function loadType()
    {
        $this->contentName = 'Done';
        $this->contentId = '9760c730-817d-436d-862e-d3a25433dd38';
        $this->closingWorkflow = true;
    }

}