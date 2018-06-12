<?php

namespace Nemundo\Workflow\Action;


use Nemundo\Core\Base\AbstractBase;

class AbstractWorkflowItemAction extends AbstractBase
{

    /**
     * @var string
     */
    public $workflowItemId;


    public function __construct($workflowItemId)
    {
        $this->workflowItemId = $workflowItemId;
    }

}