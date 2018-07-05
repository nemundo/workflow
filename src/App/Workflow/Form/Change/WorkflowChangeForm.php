<?php

namespace Nemundo\Workflow\App\Workflow\Form\Change;


use Nemundo\Design\Bootstrap\Form\BootstrapModelForm;
use Nemundo\Model\Factory\ModelFactory;



class WorkflowChangeForm extends BootstrapModelForm
{

    use WorkflowChangeFormTrait;

    public function getHtml()
    {

        $this->model = (new ModelFactory())->getModelByClassName($this->workflowStatus->modelClass);

        return parent::getHtml();

    }


    protected function onSubmit()
    {

        $workflowItemId = parent::onSubmit();
        $this->saveWorkflowItem($workflowItemId);

        return $workflowItemId;

    }

}