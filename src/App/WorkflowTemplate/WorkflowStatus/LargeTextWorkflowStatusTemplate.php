<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\WorkflowStatus;


use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\User\Data\User\UserReader;
use Nemundo\Workflow\App\ContentTemplate\Content\Data\LargeTextTemplateContent;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\LargeTextTemplateContentType;
use Nemundo\Workflow\App\Identification\Model\Identification;
use Nemundo\Workflow\App\Identification\Type\UserIdentificationType;
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

        $this->addFollowingContentTypeClass(LargeTextWorkflowStatusTemplate::class);


    }


    public function getAssignmentIdentification($dataId)
    {

        $identification = new Identification();
        $identification->identificationType = new UserIdentificationType();

        $reader = new UserReader();
        $reader->addOrder($reader->model->id, SortOrder::RANDOM);
        $row = $reader->getRow();

        $identification->identificationId = $row->id;

        return $identification;


    }


}