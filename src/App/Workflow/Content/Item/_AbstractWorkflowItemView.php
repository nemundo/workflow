<?php

namespace Nemundo\Workflow\App\Workflow\Content\Item;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\App\Content\Item\AbstractContentItem;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataListWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;


// AbstractWorkflowView
class AbstractWorkflowItemView extends AbstractContentItem  // AbstractHtmlContainerList
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