<?php

namespace Nemundo\Workflow\Site;


use Nemundo\App\Content\Site\ContentLogSite;
use Nemundo\App\Content\Site\ContentTypeSite;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Assignment\Site\AssignmentSite;
use Nemundo\Workflow\App\Dashboard\Site\DashboardSite;
use Nemundo\Workflow\App\Favorite\Site\MyFavoriteSite;
use Nemundo\Workflow\App\News\Site\NewsSite;
use Nemundo\Workflow\App\Notification\Site\NotificationSite;
use Nemundo\Workflow\App\SearchEngine\Site\SearchEngineSite;
use Nemundo\Workflow\App\Stream\Site\StreamSite;
use Nemundo\Workflow\App\Subscription\Site\MySubscriptionSite;
use Nemundo\Workflow\App\Subscription\Site\SubscriptionSite;
use Nemundo\Workflow\App\ToDo\Site\ToDoSite;
use Nemundo\Workflow\App\WorkflowTemplate\Data\File\Redirect\FileFileRedirectSite;
use Nemundo\Workflow\Usergroup\CollaborationUsergroup;

class CollaborationSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Collaboration';
        $this->url = 'collaboration';
        $this->restricted = true;
        $this->addRestrictedUsergroup(new CollaborationUsergroup());

        new StreamSite($this);
        new DashboardSite($this);
        new AssignmentSite($this);
        new NotificationSite($this);
        new ToDoSite($this);
        new NewsSite($this);
        new ContentTypeSite($this);
        new ContentLogSite($this);
        new SearchEngineSite($this);
        new SubscriptionSite($this);
        new MySubscriptionSite($this);
        new MyFavoriteSite($this);

        new FileFileRedirectSite($this);


    }


    public function loadContent()
    {

    }

}