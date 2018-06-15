<?php

namespace Nemundo\Workflow\WorkflowStatus;


use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Workflow\Com\Item\DataWorkflowItemView;
use Nemundo\Workflow\Container\Change\DraftDataWorkflowChangeContainer;


// AbstractDraftDataModelWorkflowStatus
abstract class AbstractDraftDataWorkflowStatus extends AbstractWorkflowStatus
{

    /**
     * @var AbstractModel
     */
    public $modelClassName;


    public function __construct()
    {

        $this->workflowItemViewClassName = DataWorkflowItemView::class;
        $this->changeContainerClass = DraftDataWorkflowChangeContainer::class;

        parent::__construct();

    }

}