<?php

namespace Nemundo\Workflow\WorkflowStatus;


use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Workflow\Com\Item\DataWorkflowItemView;
use Nemundo\Workflow\Container\Change\DraftDataWorkflowChangeContainer;
use Nemundo\Workflow\Container\Start\DraftDataWorkflowStartContainer;


// AbstractDraftDataModelWorkflowStatus
abstract class AbstractDraftDataWorkflowStatus extends AbstractWorkflowStatus
{

    /**
     * @var AbstractModel
     */
    public $modelClassName;


    public function __construct()
    {

        $this->itemClass = DataWorkflowItemView::class;
        $this->startContainerClass = DraftDataWorkflowStartContainer::class;
        $this->changeContainerClass = DraftDataWorkflowChangeContainer::class;

        parent::__construct();

    }

}