<?php

namespace Nemundo\Workflow\App\Workflow\Com\Container;


use Nemundo\App\Content\Factory\ContentTypeFactory;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Workflow\App\Workflow\Event\WorkflowEvent;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;
use Nemundo\Workflow\Com\Title\WorkflowTitle;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;

class StatusChangeContainer extends AbstractHtmlContainerList
{

    /**
     * @var AbstractProcess
     */
    public $process;

    public function getHtml()
    {

        $workflowId = (new WorkflowParameter())->getValue();

        $title = new WorkflowTitle($this);
        $title->workflowId = $workflowId;

        $workflowStatus = (new ContentTypeFactory())->getContentTypeByParameter();

        $factory = new StatusChangeFormFactory();
        $factory->worklfowStatus = $workflowStatus;
        $factory->workflowId = $workflowId;
        $factory->redirect = $this->process->getItemSite($workflowId);
        $factory->getForm($this);


        /*
        $event = new WorkflowEvent();
        $event->workflowStatus = $workflowStatus;
        $event->workflowId = $workflowId;

        $form = $workflowStatus->getForm($this);
        $form->afterSubmitEvent->addEvent($event);
        $form->redirectSite = $this->process->getItemSite($workflowId);*/

        return parent::getHtml();

    }

}