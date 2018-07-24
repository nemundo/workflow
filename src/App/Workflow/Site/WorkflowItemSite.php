<?php

namespace Nemundo\Workflow\App\Workflow\Site;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Design\Bootstrap\Breadcrumb\BootstrapBreadcrumb;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowItem;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\App\Workflow\Com\Button\WorkflowActionButton;
use Nemundo\Workflow\Item\AbstractProcessItem;
use Nemundo\Workflow\App\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;


class WorkflowItemSite extends AbstractSite
{

    /**
     * @var WorkflowItemSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'item';
        $this->menuActive = false;

    }


    protected function registerSite()
    {
        WorkflowItemSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $workflowId = (new WorkflowParameter())->getValue();

        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadProcess();
        $workflowRow = $workflowReader->getRowById($workflowId);

        $process = $workflowRow->process->getProcessClassObject();


        $breadcrumb = new BootstrapBreadcrumb($page);
        $breadcrumb->addItem(WorkflowSearchSite::$site);

        $site = clone(WorkflowSearchSite::$site);
        $site->title = $process->name;
        $site->addParameter(new ProcessParameter($process->id));
        $breadcrumb->addItem($site);


        //$title = new ProcessTitle($page);
        //$title->process = $process;

        $title = new AdminTitle($page);
        $title->content = $process->name;

        $item = $process->getItem($page);
        $item->dataId = $workflowRow->dataId;

        //$item->workflowId = $workflowId;

/*
        $btn = new WorkflowActionButton($page);
        $btn->workflowId = $workflowRow->id;
        $btn->statusChangeRedirectSite = StatusChangeSite::$site;


        /** @var AbstractProcessItem $item */
        /*$item = new $process->processItemClassName($page);
        $item->workflowId = $workflowId;
        $item->statusChangeRedirectSite = SearchStatusChangeSite::$site;*/


        $page->render();

    }


}