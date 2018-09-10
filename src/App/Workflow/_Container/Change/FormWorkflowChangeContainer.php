<?php

namespace Nemundo\Workflow\App\Workflow\Container\Change;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Com\Html\Form\AbstractSubmitForm;
use Nemundo\Workflow\App\Workflow\Form\WorkflowFormTrait;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractFormWorkflowStatus;

class FormWorkflowChangeContainer extends AbstractWorkflowChangeContainer
{

    /**
     * @var AbstractFormWorkflowStatus
     */
    public $workflowStatus;

    public function getHtml()
    {

        $subtitle = new AdminSubtitle($this);
        $subtitle->content = $this->workflowStatus->objectName;

        $className = $this->workflowStatus->formClass;

        /** @var AbstractSubmitForm|WorkflowFormTrait $form */
        $form = new $className($this);
        $form->workflowStatus = $this->workflowStatus;
        $form->workflowId = $this->workflowId;
        $form->redirectSite = $this->redirectSite;
        //$form->redirectSite->addParameter($workflowParameter);*/

        return parent::getHtml();

    }


}