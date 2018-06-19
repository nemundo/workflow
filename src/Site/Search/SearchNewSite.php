<?php

namespace Nemundo\Workflow\Site\Search;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Design\Bootstrap\Breadcrumb\BootstrapBreadcrumb;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Com\Html\Basic\H1;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Workflow\Com\Title\ProcessTitle;
use Nemundo\Workflow\Container\Start\WorkflowStartContainer;
use Nemundo\Workflow\Data\Process\ProcessReader;
use Nemundo\Workflow\Factory\WorkflowStatusFactory;
use Nemundo\Workflow\Form\WorkflowForm;
use Nemundo\Workflow\Form\WorkflowStartForm;
use Nemundo\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\Site\Inbox\WorkflowInboxSite;

class SearchNewSite extends AbstractSite
{

    /**
     * @var SearchNewSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'new';
        $this->menuActive = false;

    }


    protected function registerSite()
    {
        SearchNewSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $processParameter = new ProcessParameter();

        $processId = (new ProcessParameter())->getValue();
        $processRow = (new ProcessReader())->getRowById($processId);

        $process = $processRow->getProcessClassObject();


        $breadcrumb = new BootstrapBreadcrumb($page);
        $breadcrumb->addItem(WorkflowSearchEngineSite::$site);

        $site = clone(WorkflowSearchEngineSite::$site);
        $site->title = $process->process;
        $site->addParameter($processParameter);
        $breadcrumb->addSite($site);
        //$breadcrumb->addActiveItem($process->process);

        $breadcrumb->addActiveItem('Neu');

        $title = new ProcessTitle($page);
        $title->process = $process;


        /*
        $title = new AdminSubtitle($page);
        $title->content = $processRow->process;

        $p = new Paragraph($page);
        $p->content = $process->description;*/


        $container = new WorkflowStartContainer($page);
        $container->process = $process;
        $container->redirectSite = SearchItemSite::$site;
        $container->appendWorkflowParameter = true;

        //$container->redirectSite = clone(WorkflowSearchEngineSite::$site);
        //$container->redirectSite->addParameter(new ProcessParameter($processId));

        $page->render();

    }


}