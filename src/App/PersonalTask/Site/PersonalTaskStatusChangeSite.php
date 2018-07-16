<?php

namespace Nemundo\Workflow\App\PersonalTask\Site;


use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\PersonalTask\Data\PersonalTask\PersonalTaskReader;
use Nemundo\Workflow\App\Task\Site\TaskSite;
use Nemundo\Workflow\App\Workflow\Container\Change\WorkflowStatusChangeContainer;
use Nemundo\Workflow\App\Workflow\Data\WorkflowStatus\WorkflowStatusReader;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusParameter;

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


        //$personalTaskRow = (new PersonalTaskReader())->getRowById()
        $workflowStatusRow = (new WorkflowStatusReader())->getRowById($workflowStatusId);
        $workflowStatus = $workflowStatusRow->getWorkflowStatusClassObject();


        $container = new WorkflowStatusChangeContainer($page);
        $container->workflowId = $workflowId;
        $container->workflowStatus = $workflowStatus;
        $container->redirectSite = TaskSite::$site;


        $page->render();


    }

}