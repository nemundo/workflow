<?php

namespace Nemundo\Workflow\App\Workflow\Factory;


use Nemundo\App\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\System\ObjectBuilder;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractFormWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowStatusParameter;

class WorkflowStatusFactory extends AbstractBase
{

    public function getWorkflowStatus($className)
    {

        /** @var AbstractWorkflowStatus|AbstractFormWorkflowStatus $workflowStatus */
        $workflowStatus = (new ObjectBuilder())->getObject($className);

        return $workflowStatus;

    }


    public function getWorkflowStatusFromParameter() {

        $workflowStatusId = (new WorkflowStatusParameter())->getValue();
        $workflowStatusRow = (new ContentTypeReader())->getRowById($workflowStatusId);

        /** @var AbstractWorkflowStatus $workflowStatus */
        $workflowStatus = $workflowStatusRow->getContentTypeClassObject();

        return $workflowStatus;

    }

}