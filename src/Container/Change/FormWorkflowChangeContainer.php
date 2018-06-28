<?php

namespace Nemundo\Workflow\Container\Change;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Com\Html\Form\AbstractSubmitForm;
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

        $subtitle = new AdminSubtitle($this);
        $subtitle->content = $this->workflowStatus->name;

        $className = $this->workflowStatus->formClassName;

        /** @var AbstractSubmitForm|WorkflowFormTrait $form */
        $form = new $className($this);
        $form->workflowStatus = $this->workflowStatus;
        $form->workflowId = $this->workflowId;
        $form->redirectSite = $this->redirectSite;
        //$form->redirectSite->addParameter($workflowParameter);*/

        return parent::getHtml();

    }


}