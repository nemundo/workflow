<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Workflow\App\Workflow\Content\Item\DataWorkflowItemView;
use Nemundo\Workflow\App\Workflow\Container\Change\DataWorkflowChangeContainer;
use Nemundo\Workflow\App\Workflow\Container\Start\DataWorkflowStartContainer;
use Nemundo\Workflow\App\Workflow\Event\WorkflowEvent;


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


    public function getForm($parentItem = null)
    {

        $form = parent::getForm($parentItem);

        if ($this->createWorkflowEvent) {

            //$event = new WorkflowEvent();
            //$event->workflowStatus = $this;
            //$event->workflowId = $this->workflowId;

            //$form->afterSubmitEvent->addEvent($event);

        }

        return $form;


    }


}