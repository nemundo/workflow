<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus;

use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange\SubjectChangeModel;
use Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange\SubjectChangeReader;

class SubjectChangeWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadData()
    {

        $this->name = 'Change Subject';
        $this->id = 'bea4e096-e356-4b07-886e-8c5533f052d5';
        $this->changeWorkflowStatus = false;
        $this->modelClass = SubjectChangeModel::class;

    }


    public function onCreate($dataId)
    {

        $row = (new SubjectChangeReader())->getRowById($dataId);
        $this->changeSubject($row->subject);

    }

}