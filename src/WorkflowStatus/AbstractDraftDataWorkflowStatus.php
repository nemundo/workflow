<?php

namespace Nemundo\Workflow\WorkflowStatus;


use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Workflow\Com\Item\DataWorkflowItem;


// AbstractModelWorkflowStatus
abstract class AbstractDraftDataWorkflowStatus extends AbstractWorkflowStatus
{

    /**
     * @var AbstractModel
     */
    public $modelClassName;


    public function __construct()
    {

        $this->workflowItemClassName = DataWorkflowItem::class;
        parent::__construct();

    }


}