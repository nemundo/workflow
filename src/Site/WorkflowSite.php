<?php

namespace Nemundo\Workflow\Site;


use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Site\Assignment\UserAssignmentAdminSite;
use Nemundo\Workflow\Site\Assignment\UsergroupAssignmentAdminSite;
use Nemundo\Workflow\Site\Inbox\WorkflowInboxCreatedSite;
use Nemundo\Workflow\Site\Inbox\WorkflowInboxSite;
use Nemundo\Workflow\Site\Item\WorkflowItem2Site;
use Nemundo\Workflow\Site\Notification\NotificationDeleteSite;
use Nemundo\Workflow\Site\Notification\NotificationAdminSite;
use Nemundo\Workflow\Site\Notification\NotificationSite;
use Nemundo\Workflow\Site\Process\ProcessSite;
use Nemundo\Workflow\Site\Json\SearchEngineJsonSite;
use Nemundo\Workflow\Site\Search\WorkflowSearchEngineSite;
use Nemundo\Workflow\Site\StatusChange\StatusChangeSite;
use Nemundo\Workflow\Site\Workflow\WorkflowDeleteSite;
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
        new NotificationSite($this);
        new ProcessSite($this);
        new LastChangeSite($this);

        new StatusChangeSite($this);


        new WorkflowActionPanelSite($this);
        new WorkflowSubscriptionSite($this);

        new WorkflowItemSite($this);
        new WorkflowItem2Site($this);

        new WorkflowFormUpdateSite($this);
        new WorkflowDraftFreigabeSite($this);
        new WorkflowNewSite($this);
        new WorkflowDeleteSite($this);

        new NotificationAdminSite($this);
        new NotificationDeleteSite($this);

        new UserAssignmentAdminSite($this);
        new UsergroupAssignmentAdminSite($this);


        new SearchEngineJsonSite($this);


    }


    protected function registerSite()
    {

        WorkflowSite::$site = $this;

    }


    public function loadContent()
    {

    }

}