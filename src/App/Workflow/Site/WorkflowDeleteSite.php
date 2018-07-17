<?php

namespace Nemundo\Workflow\App\Workflow\Site;


use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowDelete;
use Nemundo\Workflow\Parameter\WorkflowParameter;

class WorkflowDeleteSite extends AbstractSite
{

    /**
     * @var WorkflowDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'workflow-delete';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        WorkflowDeleteSite::$site = $this;
    }


    public function loadContent()
    {

        $workflowId = (new WorkflowParameter())->getValue();
        (new WorkflowDelete())->deleteWorkflow($workflowId);

        (new UrlReferer())->redirect();

    }

}