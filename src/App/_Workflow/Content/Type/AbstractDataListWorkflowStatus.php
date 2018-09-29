<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;

use Nemundo\App\Content\Type\AbstractDataListContentType;

abstract class AbstractDataListWorkflowStatus extends AbstractDataListContentType
{

    use WorkflowStatusTrait;


    public function __construct()
    {

        $this->draftMode = true;
        parent::__construct();

    }


}