<?php

namespace Nemundo\Workflow\Site\Search;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Html\Hyperlink\Hyperlink;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Com\Html\Basic\H1;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Workflow\Builder\WorkflowItem;
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


        $link = new Hyperlink($page);
        $link->content = 'Back';
        $link->site = clone(WorkflowSearchEngineSite::$site);

        $item = new WorkflowItem($workflowId);
        $process = $item->getProcess();


        $title = new AdminTitle($page);
        $title->content = $process->process;


        /** @var AbstractProcessItem $item */
        $item = new $process->processItemClassName($page);
        $item->workflowId = $workflowId;


        $page->render();

    }


}