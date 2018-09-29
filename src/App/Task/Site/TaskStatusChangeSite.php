<?php

namespace Nemundo\Workflow\App\Task\Site;


use Nemundo\App\Content\Factory\ContentTypeFactory;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Task\Item\TaskItem;
use Nemundo\Workflow\App\Task\Parameter\TaskParameter;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\App\Workflow\Event\WorkflowEvent;
use Nemundo\Workflow\App\Workflow\Com\Title\WorkflowTitle;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowStatusParameter;

class TaskStatusChangeSite extends AbstractSite
{

    /**
     * @var TaskStatusChangeSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'status-change';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        TaskStatusChangeSite::$site= $this;
    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $workflowId = (new WorkflowParameter())->getValue();
        $workflowStatusId = (new WorkflowStatusParameter())->getValue();


        $title = new WorkflowTitle($page);
        $title->workflowId = $workflowId;


        $contentType = (new ContentTypeFactory())->getContentTypeByParameter();

        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadProcess();
        $workflowRow = $workflowReader->getRowById($workflowId);
        $process = $workflowRow->process->getProcessClassObject();



        $event = new WorkflowEvent();
        $event->workflowStatus = $contentType;
        $event->workflowId = $workflowId;


        $form = $contentType->getForm($page);
        $form->afterSubmitEvent->addEvent($event);
        $form->redirectSite = $process->getItemSite($workflowId);

        //$form->redirectSite = TaskItemSite::$site;  // PersonalTaskItemSite::$site;
        //$form->redirectSite->addParameter(new TaskParameter($workflowId));


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