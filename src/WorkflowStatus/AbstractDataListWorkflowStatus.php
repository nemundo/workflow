<?php

namespace Nemundo\Workflow\WorkflowStatus;


use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Workflow\Com\Item\DataListWorkflowItem;

abstract class AbstractDataListWorkflowStatus extends AbstractWorkflowStatus
{

    /**
     * @var AbstractModel
     */
    public $modelListClassName;

    public function __construct()
    {

        $this->workflowItemClassName = DataListWorkflowItem::class;

        parent::__construct();

    }


}