<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus;


use Nemundo\Workflow\App\ContentTemplate\Content\Data\LargeTextTemplateContent;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\LargeTextTemplateContentType;
use Nemundo\Workflow\App\Identification\Model\Identification;
use Nemundo\Workflow\App\Workflow\Content\Type\WorkflowStatusTrait;

class LargeTextWorkflowStatusTemplate extends LargeTextTemplateContentType
{

    use WorkflowStatusTrait;

    protected function loadData()
    {
        parent::loadData();

        $this->name = 'Large Text (Workflow)';
        $this->id = '37d570b7-f0b8-4057-ac0a-f1e2002dd3c7';

        $this->statusText = 'Text wurde hinzugefügt';


    }


    public function getAssignmentIdentification($dataId)
    {

        //$identification = new Identification();
        //$identification->



    }


}