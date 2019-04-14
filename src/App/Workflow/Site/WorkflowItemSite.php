<?php

namespace Nemundo\Workflow\App\Workflow\Site;


use Nemundo\Workflow\App\Workflow\Content\Process\AbstractWorkflowProcess;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Com\Breadcrumb\WorkflowBreadcrumb;
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

        $this->url = 'workflow-item';
        $this->menuActive = false;

    }

    protected function registerSite()
    {
        WorkflowItemSite::$site=$this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $workflowId = (new WorkflowParameter())->getValue();


        $breadcrumb = new WorkflowBreadcrumb($page);


        $processClassName = (new ProcessParameter())->getProcessClassName();

        //$process = new CountryProcess($workflowId);

        /** @var AbstractWorkflowProcess $process */
        $process = new $processClassName($workflowId);
        $process->getView($page);

        $breadcrumb->addActiveItem($process->contentLabel);


        $page->render();


    }

}