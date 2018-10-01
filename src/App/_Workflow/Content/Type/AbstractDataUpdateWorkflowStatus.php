<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\Workflow\App\Workflow\Com\Form\WorkflowModelFormUpdate;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;

abstract class AbstractDataUpdateWorkflowStatus extends AbstractModelDataWorkflowStatus
{

    public function getForm($parentItem = null)
    {

        $workflowId = (new WorkflowParameter())->getValue();

        $form = new WorkflowModelFormUpdate($parentItem);
        $form->model = $this->getModel();
        $form->updateId = $workflowId;

        return parent::getForm($parentItem);

    }

}