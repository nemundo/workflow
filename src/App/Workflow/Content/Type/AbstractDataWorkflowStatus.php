<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\App\Content\Type\AbstractDataContentType;
use Nemundo\Workflow\App\Workflow\Form\WorkflowContentForm;


abstract class AbstractDataWorkflowStatus extends AbstractDataContentType
{


    use WorkflowStatusTrait;

    public function getForm($parentItem = null)
    {

        /** @var WorkflowContentForm $form */
        $form = parent::getForm($parentItem);

        if ($form->isObjectOfClass(WorkflowContentForm::class)) {
            $form->workflowId = $this->workflowId;
        }

        return $form;

    }

}