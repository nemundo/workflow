<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Workflow\App\Workflow\Com\Form\StatusChangeForm;
use Nemundo\Workflow\App\Workflow\Content\Item\SubjectWorkflowView;

abstract class AbstractChangeWorkflowStatus extends AbstractContentType
{

    use WorkflowStatusTrait;

    public function __construct()
    {

        parent::__construct();
        $this->viewClass = SubjectWorkflowView::class;

    }


    public function getForm($parentItem = null)
    {

        $form = new StatusChangeForm($parentItem);
        return $form;

    }


}