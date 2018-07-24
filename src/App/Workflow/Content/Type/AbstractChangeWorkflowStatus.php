<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\Workflow\App\Workflow\Com\Form\StatusChangeForm;
use Nemundo\Workflow\App\Workflow\Content\Item\ChangeWorkflowItemView;
use Nemundo\Workflow\App\Workflow\Container\Change\ChangeWorkflowChangeContainer;
use Nemundo\Workflow\App\Workflow\Container\Start\ChangeWorkflowStartContainer;

abstract class AbstractChangeWorkflowStatus extends AbstractWorkflowStatus
{

    public function __construct()
    {

        //$this->itemClass = ChangeWorkflowItemView::class;
        $this->startContainerClass = ChangeWorkflowStartContainer::class;
        $this->changeContainerClass = ChangeWorkflowChangeContainer::class;
        parent::__construct();

        $this->itemClass = ChangeWorkflowItemView::class;

    }


    public function getForm($parentItem = null)
    {

        $form = new StatusChangeForm($parentItem);
        return $form;

    }


}