<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Workflow\App\Workflow\Com\Form\StatusChangeForm;
use Nemundo\Workflow\App\Workflow\Content\Item\ChangeWorkflowItemView;
use Nemundo\Workflow\App\Workflow\Container\Change\ChangeWorkflowChangeContainer;
use Nemundo\Workflow\App\Workflow\Container\Start\ChangeWorkflowStartContainer;

abstract class AbstractChangeWorkflowStatus extends AbstractContentType  // AbstractWorkflowStatus
{

    use WorkflowStatusTrait;

    public function __construct()
    {

        parent::__construct();
        $this->itemClass = ChangeWorkflowItemView::class;

    }


    public function getForm($parentItem = null)
    {

        $form = new StatusChangeForm($parentItem);
        return $form;

    }


}