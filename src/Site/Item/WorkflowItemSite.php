<?php

namespace Nemundo\Workflow\Site\Item;


use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Com\View\WorkflowViewList;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Site\StatusChange\StatusChangeSite;

class WorkflowItemSite extends AbstractSite
{

    /**
     * @var WorkflowItemSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Item';
        $this->url = 'item';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        $this::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $workflowId = (new WorkflowParameter())->getValue();

        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadWorkflowStatus();
        $workflowReader->model->loadProcess();
        $workflowRow = $workflowReader->getRowById($workflowId);

        $application = $workflowRow->process->getProcessClassObject();

        $workflow = new WorkflowViewList($page);
        $workflow->process = $application;
        $workflow->workflowId = $workflowRow->id;
        $workflow->statusChangeRedirectSite = StatusChangeSite::$site;

        $page->render();


    }


}