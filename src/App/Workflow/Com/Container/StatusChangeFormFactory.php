<?php

namespace Nemundo\Workflow\App\Workflow\Com\Container;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Event\WorkflowEvent;

class StatusChangeFormFactory extends AbstractBaseClass
{

    /**
     * @var AbstractWorkflowStatus
     */
    public $worklfowStatus;

    /**
     * @var string
     */
    public $workflowId;

    /**
     * @var AbstractSite
     */
    public $redirect;


    public function getForm($parentItem = null) {

        $contentType = clone($this->worklfowStatus);
        $contentType->workflowId = $this->workflowId;

        $event = new WorkflowEvent();
        $event->workflowStatus = $this->worklfowStatus;
        $event->workflowId = $this->workflowId;

        $form = $contentType->getForm($parentItem);
        $form->afterSubmitEvent->addEvent($event);
        $form->redirectSite =$this->redirect;

        return $form;

    }


}