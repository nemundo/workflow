<?php

namespace Nemundo\Workflow\Site\Search;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Html\Hyperlink\Hyperlink;
use Nemundo\Design\Bootstrap\Breadcrumb\BootstrapBreadcrumb;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Com\Html\Basic\H1;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Workflow\Builder\WorkflowItem;
use Nemundo\Workflow\Com\Title\ProcessTitle;
use Nemundo\Workflow\Data\Process\ProcessReader;
use Nemundo\Workflow\Factory\WorkflowStatusFactory;
use Nemundo\Workflow\Form\WorkflowForm;
use Nemundo\Workflow\Form\WorkflowStartForm;
use Nemundo\Workflow\Item\AbstractProcessItem;
use Nemundo\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Site\Inbox\WorkflowInboxSite;


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
        $site->title = $process->process;
        $site->addParameter(new ProcessParameter($process->processId));
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