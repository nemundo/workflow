<?php

namespace Nemundo\Workflow\WorkflowStatus;


use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Workflow\Com\Item\DataWorkflowItemView;
use Nemundo\Workflow\Container\Change\DataWorkflowChangeContainer;
use Nemundo\Workflow\Container\Start\DataWorkflowStartContainer;


// AbstractModelWorkflowStatus
abstract class AbstractDataWorkflowStatus extends AbstractWorkflowStatus
{

    /**
     * @var AbstractModel
     */
    public $modelClassName;


    public function __construct()
    {

        $this->itemClass = DataWorkflowItemView::class;

        $this->startContainerClass = DataWorkflowStartContainer::class;
        $this->changeContainerClass = DataWorkflowChangeContainer::class;

        parent::__construct();


    }


}