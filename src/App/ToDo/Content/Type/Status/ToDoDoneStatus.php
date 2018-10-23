<?php

namespace Nemundo\Workflow\App\ToDo\Content\Type\Status;


use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoUpdate;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractStatusChangeWorkflowStaus;

class ToDoDoneStatus extends AbstractStatusChangeWorkflowStaus
{

    protected function loadType()
    {
        $this->contentLabel = 'Done';
        $this->contentId = '9760c730-817d-436d-862e-d3a25433dd38';
        $this->closingWorkflow = true;
    }


    public function saveType()
    {

        $this->saveContentLog();

        $update = new ToDoUpdate();
        $update->done = true;
        $update->updateById($this->parentContentType->dataId);

    }


}