<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus;

use Nemundo\Workflow\App\Workflow\Content\Type\AbstractModelDataWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange\SubjectChangeModel;
use Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange\SubjectChangeReader;

class SubjectChangeWorkflowStatus extends AbstractModelDataWorkflowStatus
{

    protected function loadData()
    {

        $this->contentName = 'Change Subject';
        $this->contentId = 'bea4e096-e356-4b07-886e-8c5533f052d5';
        $this->changeWorkflowStatus = false;
        $this->modelClass = SubjectChangeModel::class;

    }


    public function onCreate($dataId)
    {

        $row = (new SubjectChangeReader())->getRowById($dataId);
        $this->changeSubject($row->subject);

    }

}