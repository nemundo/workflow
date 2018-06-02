<?php

namespace Nemundo\Workflow\Site;


use Nemundo\Com\Html\Basic\H1;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Com\WorkflowItemList;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Parameter\WorkflowParameter;

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

        $title = new H1($page);
        $title->content = $application->process;

        $workflow = new WorkflowItemList($page);
        $workflow->process = $application;
        $workflow->workflowId = $workflowRow->id;

        $page->render();


    }


}