<?php

namespace Nemundo\Workflow\App\PersonalTask\Site;


use Nemundo\App\Content\Factory\ContentTypeFactory;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Event\WorkflowEvent;
use Nemundo\Workflow\App\Workflow\Com\Title\WorkflowTitle;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowStatusParameter;

class PersonalTaskStatusChangeSite extends AbstractSite
{

    /**
     * @var PersonalTaskStatusChangeSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'status-change';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        PersonalTaskStatusChangeSite::$site = $this;
    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $workflowId = (new WorkflowParameter())->getValue();
        $workflowStatusId = (new WorkflowStatusParameter())->getValue();


        $title = new WorkflowTitle($page);
        $title->workflowId = $workflowId;


        $contentType = (new ContentTypeFactory())->getContentTypeByParameter();

        $event = new WorkflowEvent();
        $event->workflowStatus = $contentType;
        $event->workflowId = $workflowId;


        $form = $contentType->getForm($page);
        $form->afterSubmitEvent->addEvent($event);
        $form->redirectSite = PersonalTaskItemSite::$site;
        $form->redirectSite->addParameter(new DataIdParameter($workflowId));


        //$personalTaskRow = (new PersonalTaskReader())->getRowById()
        /*$workflowStatusRow = (new WorkflowStatusReader())->getRowById($workflowStatusId);
        $workflowStatus = $workflowStatusRow->getWorkflowStatusClassObject();


        $container = new WorkflowStatusChangeContainer($page);
        $container->workflowId = $workflowId;
        $container->workflowStatus = $workflowStatus;
        $container->redirectSite = TaskSite::$site;*/


        $page->render();


    }

}