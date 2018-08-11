<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\App\Content\Type\AbstractDataListContentType;

abstract class AbstractDataListWorkflowStatus extends AbstractDataListContentType  // AbstractWorkflowStatus
{

    use WorkflowStatusTrait;

}