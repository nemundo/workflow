<?php

namespace Nemundo\Workflow\Container\Change;


use Nemundo\Workflow\Form\WorkflowForm;
use Nemundo\Workflow\Form\WorkflowFormTrait;
use Nemundo\Workflow\WorkflowStatus\AbstractFormWorkflowStatus;

class FormWorkflowChangeContainer extends AbstractWorkflowChangeContainer
{

    /**
     * @var AbstractFormWorkflowStatus
     */
    public $workflowStatus;

    public function getHtml()
    {

        $className = $this->workflowStatus->formClassName;

        /** @var WorkflowFormTrait $form */
        $form = new $className($this);
        $form->workflowStatus = $this->workflowStatus;
        $form->workflowId = $this->workflowId;
        //$form->redirectSite = clone(WorkflowItemSite::$site);
        //$form->redirectSite->addParameter($workflowParameter);*/

        return parent::getHtml();

    }


}