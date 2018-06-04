<?php

namespace Nemundo\Workflow\Form;


use Nemundo\Core\Log\LogMessage;
use Nemundo\Design\Bootstrap\Form\BootstrapModelForm;
use Nemundo\Model\Data\ModelData;
use Nemundo\Model\Data\ModelUpdate;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Model\Form\AbstractModelForm;
use Nemundo\App\Application\Type\AbstractWorkflowApplication;
use Nemundo\Workflow\Builder\WorkflowBuilder;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class WorkflowStartForm extends BootstrapModelForm
{

    use WorkflowFormTrait;

    public function getHtml()
    {

        /*
        if (is_null($this->workflowStatus->modelClassName)) {
            LogMessage::writeError('Workflow Form: No Model Class Name');
            return;
        }*/


        //$workflowReader = new WorkflowReader();
        //$workflowReader->model->loadWorkflowStatus();

        $this->model = (new ModelFactory())->getModelByClassName($this->workflowStatus->modelClassName);

        return parent::getHtml();

    }


    protected function onSubmit()
    {

        $workflowItemId = parent::onSubmit();

        $builder = new WorkflowBuilder();
        $builder->process = $this->process;
        $builder->workflowItemId = $workflowItemId;
        //$builder->workflowStatus = $this->workflowStatus;
        //$builder->dataId = $workflowItemId; // $dataId;
        $builder->createItem();




        return $workflowItemId;

    }


}