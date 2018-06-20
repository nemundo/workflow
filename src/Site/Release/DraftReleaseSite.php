<?php

namespace Nemundo\Workflow\Site\Release;


use Nemundo\Core\Debug\Debug;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\Url;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\Builder\DraftRelease;
use Nemundo\Workflow\Data\Workflow\WorkflowUpdate;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeUpdate;
use Nemundo\Workflow\Parameter\RedirectParameter;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusChangeParameter;

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


        $url = (new RedirectParameter())->getValue();

        (new Url($url))->redirect();

        //(new Debug())->write($url);


        //(new UrlReferer())->redirect();


    }

}