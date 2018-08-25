<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\App\Content\Type\AbstractContentType;

abstract class AbstractWorkflowStatus extends AbstractContentType
{

    use WorkflowStatusTrait;


}