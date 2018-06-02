<?php

namespace Nemundo\Workflow\Site;


use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Site\Inbox\WorkflowInboxCreatedSite;
use Nemundo\Workflow\Site\Inbox\WorkflowInboxSite;
use Nemundo\Workflow\Site\Process\ProcessSite;
use Nemundo\Workflow\Usergroup\WorkflowUsergroup;


class WorkflowSite extends AbstractSite
{

    /**
     * @var WorkflowSite
     */
    public static $site;


    protected function loadSite()
    {

        $this->title = 'Workflow';
        $this->url = 'workflow-app';
        $this->restricted = true;
        $this->addRestrictedUsergroup(new WorkflowUsergroup());

        new WorkflowInboxSite($this);
        new WorkflowInboxCreatedSite($this);
        new WorkflowSearchEngineSite($this);
        new ProcessSite($this);
        new LastChangeSite($this);

        new WorkflowStatusChangeSite($this);
        new WorkflowSubscriptionSite($this);
        new WorkflowItemSite($this);
        new WorkflowFormUpdateSite($this);
        new WorkflowDraftFreigabeSite($this);
        new WorkflowNewSite($this);

    }


    protected function registerSite()
    {

        WorkflowSite::$site = $this;

    }


    public function loadContent()
    {

    }

}