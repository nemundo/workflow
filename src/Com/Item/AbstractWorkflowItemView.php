<?php

namespace Nemundo\Workflow\Com\Item;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Workflow\WorkflowStatus\AbstractDataListWorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;


// AbstractWorkflowView
class AbstractWorkflowItemView extends AbstractHtmlContainerList
{

    /**
     * @var string
     */
    public $workflowId;

    /**
     * @var string
     */
    public $workflowItemId;



    // kein item Id


    /**
     * @var string
     */
    //public $statusChangeId;


    /**
     * @var AbstractWorkflowStatus|AbstractDataListWorkflowStatus
     */
    public $workflowStatus;


}