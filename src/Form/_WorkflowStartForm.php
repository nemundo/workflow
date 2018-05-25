<?php

namespace Nemundo\Workflow\Form;


use Nemundo\Core\Log\LogMessage;
use Nemundo\Design\Bootstrap\Form\BootstrapModelForm;
use Schleuniger\App\Application\Type\AbstractWorkflowApplication;
use Nemundo\Workflow\Builder\WorkflowBuilder;
use Nemundo\Workflow\Status\AbstractWorkflowStatus;

class WorkflowStartForm extends BootstrapModelForm
{


    /**
     * @var AbstractWorkflowApplication
     */
    public $applicationType;

    /**
     * @var AbstractWorkflowStatus
     */
    public $workflowStatus;

    /**
     * @var string
     */
    //public $workflowId;


    public function getHtml()
    {

        if (is_null($this->workflowStatus->modelClassName)) {
            LogMessage::writeError('Workflow Form: No Model Class Name');
            return;
        }

        $this->model = new $this->workflowStatus->modelClassName();

        return parent::getHtml();
    }


    protected function onSubmit()
    {

        $builder = new WorkflowBuilder();
        $builder->application =$this->applicationType;
        $builder->workflowSubject = '';
        $builder->workflowStatus =$this->workflowStatus;
        $builder->createItem();


        $workflowItemId = parent::onSubmit();
        $this->workflowStatus->runWorkflow($this->workflowId, $workflowItemId);

        return $workflowItemId;

    }


}