<?php

namespace Nemundo\Workflow\Site;


use Nemundo\Web\Site\AbstractSite;

class WorkflowSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->url = 'workflow-app';
        $this->menuActive = false;

        new WorkflowStatusChangeSite($this);
        new WorkflowSubscriptionSite($this);
        new WorkflowItemSite($this);
        new WorkflowFormUpdateSite($this);
        new WorkflowDraftFreigabeSite($this);

    }


    public function loadContent()
    {

    }

}