<?php

namespace Nemundo\Workflow\Site\StatusChange;


use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Com\Title\WorkflowTitle;
use Nemundo\Workflow\App\Workflow\Container\Change\WorkflowStatusChangeContainer;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowStatusParameter;
use Nemundo\Workflow\Site\Search\WorkflowSearchEngineSite;


class StatusChangeSite extends AbstractSite
{

    /**
     * @var StatusChangeSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'status-change';
        $this->menuActive = false;
    }

    protected function registerSite()
    {
        StatusChangeSite::$site = $this;
    }


    public function loadContent()
    {

        $workflowParameter = new WorkflowParameter();
        $workflowId = $workflowParameter->getValue();
        
        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $title = new WorkflowTitle($page);
        $title->workflowId = $workflowId;

        $container = new WorkflowStatusChangeContainer($page);
        $container->workflowStatus = (new WorkflowStatusParameter())->getWorkflowStatus();
        $container->workflowId = $workflowId;
        $container->redirectSite = WorkflowSearchEngineSite::$site;

        $page->render();

    }

}