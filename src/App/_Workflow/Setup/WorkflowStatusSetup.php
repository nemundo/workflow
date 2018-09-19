<?php

namespace Nemundo\Workflow\App\Workflow\Setup;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;

class WorkflowStatusSetup extends AbstractBase
{

    public function addWorkflowStatus(AbstractContentType $workflowStatus)
    {


        $setup = new ContentTypeSetup();
        $setup->addContentType($workflowStatus);

    }

}