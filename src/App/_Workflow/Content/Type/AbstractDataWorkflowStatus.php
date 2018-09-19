<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\App\Content\Type\AbstractDataContentType;
use Nemundo\Core\Debug\Debug;
use Nemundo\Workflow\App\Workflow\Form\WorkflowContentForm;
use Nemundo\Workflow\App\Workflow\Form\WorkflowModelForm;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;


abstract class AbstractDataWorkflowStatus extends AbstractDataContentType
{


    use WorkflowStatusTrait;

    public function getForm($parentItem = null)
    {


        //(new Debug())->write($this->workflowId);
        //exit;



        /** @var WorkflowContentForm $form */
        //$form = parent::getForm($parentItem);

        $form = new WorkflowModelForm($parentItem);
        $form->model = $this->getModel();
        $form->workflowStatus = $this;
        $form->workflowId = (new WorkflowParameter())->getValue();  // $this->workflowId;


        /*
        if ($form->isObjectOfClass(WorkflowContentForm::class)) {
            $form->workflowId = $this->workflowId;
        }*/

        return $form;

    }

}