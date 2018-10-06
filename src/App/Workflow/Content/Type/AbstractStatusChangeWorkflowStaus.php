<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\App\Content\Type\Workflow\AbstractWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Form\StatusChangeForm;

abstract class AbstractStatusChangeWorkflowStaus extends AbstractWorkflowStatus
{

    public function __construct($dataId = null)
    {

        $this->formClass = StatusChangeForm::class;
        parent::__construct($dataId);

    }

}