<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Workflow\App\Workflow\Content\Item\DataWorkflowItemView;
use Nemundo\Workflow\App\Workflow\Container\Change\DraftDataWorkflowChangeContainer;
use Nemundo\Workflow\App\Workflow\Container\Start\DraftDataWorkflowStartContainer;


// AbstractDraftDataModelWorkflowStatus
abstract class AbstractDraftDataWorkflowStatus extends AbstractWorkflowStatus
{

    /**
     * @var AbstractModel
     */
    //public $modelClass;


    public function __construct()
    {

        $this->itemClass = DataWorkflowItemView::class;
        $this->startContainerClass = DraftDataWorkflowStartContainer::class;
        $this->changeContainerClass = DraftDataWorkflowChangeContainer::class;

        parent::__construct();

    }

}