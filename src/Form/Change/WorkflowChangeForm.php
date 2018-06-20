<?php

namespace Nemundo\Workflow\Form\Change;


use Nemundo\Design\Bootstrap\Form\BootstrapModelForm;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Workflow\Form\Change\WorkflowChangeFormTrait;


class WorkflowChangeForm extends BootstrapModelForm
{

    use WorkflowChangeFormTrait;

    public function getHtml()
    {

        $this->model = (new ModelFactory())->getModelByClassName($this->workflowStatus->modelClassName);

        return parent::getHtml();

    }


    protected function onSubmit()
    {

        $workflowItemId = parent::onSubmit();
        $this->saveWorkflowItem($workflowItemId);

        return $workflowItemId;

    }

}