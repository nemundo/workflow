<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\App\Content\Item\DataContentItem;
use Nemundo\App\Content\Type\AbstractDataContentType;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Workflow\App\Workflow\Content\Item\DataWorkflowItemView;
use Nemundo\Workflow\App\Workflow\Container\Change\DataWorkflowChangeContainer;
use Nemundo\Workflow\App\Workflow\Container\Start\DataWorkflowStartContainer;
use Nemundo\Workflow\App\Workflow\Event\WorkflowEvent;
use Nemundo\Workflow\App\Workflow\Form\WorkflowContentForm;


// AbstractModelWorkflowStatus
abstract class AbstractDataWorkflowStatus extends AbstractDataContentType  // AbstractWorkflowStatus
{

    /**
     * @var AbstractModel
     */
    //public $modelClass;

    use WorkflowStatusTrait;


    /*public function __construct()
    {

        //$this->itemClass = DataWorkflowItemView::class;

        //$this->itemClass = DataContentItem::class;


        //$this->startContainerClass = DataWorkflowStartContainer::class;
        //$this->changeContainerClass = DataWorkflowChangeContainer::class;

        parent::__construct();


    }*/


    public function getForm($parentItem = null)
    {

        /** @var WorkflowContentForm $form */
        $form = parent::getForm($parentItem);

        if ($form->isObjectOfClass(WorkflowContentForm::class)) {
            $form->workflowId = $this->workflowId;
        }

        return $form;

    }



/*
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


    }*/


}