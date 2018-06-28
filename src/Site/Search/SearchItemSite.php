<?php

namespace Nemundo\Workflow\Site\Search;


use Nemundo\Design\Bootstrap\Breadcrumb\BootstrapBreadcrumb;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Workflow\Builder\WorkflowItem;
use Nemundo\Workflow\Item\AbstractProcessItem;
use Nemundo\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\Parameter\WorkflowParameter;



class SearchItemSite extends AbstractSite
{

    /**
     * @var SearchItemSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'item';
        $this->menuActive = false;

    }


    protected function registerSite()
    {
        SearchItemSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $workflowId = (new WorkflowParameter())->getValue();


        $item = new WorkflowItem($workflowId);
        $process = $item->getProcess();

        $breadcrumb = new BootstrapBreadcrumb($page);
        $breadcrumb->addItem(WorkflowSearchEngineSite::$site);

        $site = clone(WorkflowSearchEngineSite::$site);
        $site->title = $process->name;
        $site->addParameter(new ProcessParameter($process->id));
        $breadcrumb->addItem($site);


        //$title = new ProcessTitle($page);
        //$title->process = $process;


        //$title = new AdminTitle($page);
        //$title->content = $process->process;


        /** @var AbstractProcessItem $item */
        $item = new $process->processItemClassName($page);
        $item->workflowId = $workflowId;
        $item->statusChangeRedirectSite = SearchStatusChangeSite::$site;


        $page->render();

    }


}