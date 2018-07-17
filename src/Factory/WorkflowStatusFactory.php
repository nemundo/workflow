<?php

namespace Nemundo\Workflow\Factory;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\System\ObjectBuilder;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractFormWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;

class WorkflowStatusFactory extends AbstractBase
{

    public function getWorkflowStatus($className)
    {

        /** @var AbstractWorkflowStatus|AbstractFormWorkflowStatus $workflowStatus */
        $workflowStatus = (new ObjectBuilder())->getObject($className);

        return $workflowStatus;

    }

}