<?php

namespace Nemundo\Workflow\WorkflowStatus;


use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Workflow\Com\Item\DataListWorkflowItem;
use Nemundo\Workflow\Container\Change\DataListWorkflowChangeContainer;
use Nemundo\Workflow\Container\Start\DataListWorkflowStartContainer;

abstract class AbstractDataListWorkflowStatus extends AbstractWorkflowStatus
{

    /**
     * @var AbstractModel
     */
    public $modelListClassName;

    public function __construct()
    {

        $this->workflowItemClassName = DataListWorkflowItem::class;

        $this->startContainerClass = DataListWorkflowStartContainer::class;
        $this->changeContainerClass = DataListWorkflowChangeContainer::class;

        parent::__construct();

    }


}