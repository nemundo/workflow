<?php

namespace Nemundo\Workflow\App\Workflow\Site;


use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\App\Workflow\Builder\DraftRelease;
use Nemundo\Workflow\Parameter\WorkflowParameter;


class DraftReleaseSite extends AbstractSite
{

    /**
     * @var DraftReleaseSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'draft-release';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        DraftReleaseSite::$site = $this;
    }

    public function loadContent()
    {

        $workflowId = (new WorkflowParameter())->getValue();
        (new DraftRelease())->releaseDraft($workflowId);

        (new UrlReferer())->redirect();

    }

}