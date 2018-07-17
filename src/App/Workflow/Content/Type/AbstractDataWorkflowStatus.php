<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Workflow\App\Workflow\Content\Item\DataWorkflowItemView;
use Nemundo\Workflow\App\Workflow\Container\Change\DataWorkflowChangeContainer;
use Nemundo\Workflow\App\Workflow\Container\Start\DataWorkflowStartContainer;


// AbstractModelWorkflowStatus
abstract class AbstractDataWorkflowStatus extends AbstractWorkflowStatus
{

    /**
     * @var AbstractModel
     */
    //public $modelClass;


    public function __construct()
    {

        $this->itemClass = DataWorkflowItemView::class;

        $this->startContainerClass = DataWorkflowStartContainer::class;
        $this->changeContainerClass = DataWorkflowChangeContainer::class;

        parent::__construct();


    }


}