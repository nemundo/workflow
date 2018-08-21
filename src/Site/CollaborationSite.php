<?php

namespace Nemundo\Workflow\Site;


use Nemundo\App\Content\Site\ContentTreeSite;
use Nemundo\App\Content\Site\ContentTypeSite;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Favorite\Site\MyFavoriteSite;
use Nemundo\Workflow\App\Inbox\Site\InboxSite;
use Nemundo\Workflow\App\Inbox\Site\InboxStreamSite;
use Nemundo\Workflow\App\Message\Site\MessageSite;
use Nemundo\Workflow\App\News\Site\NewsSite;
use Nemundo\Workflow\App\SearchEngine\Site\SearchEngineSite;
use Nemundo\Workflow\App\Stream\Site\StreamSite;
use Nemundo\Workflow\App\Subscription\Site\MySubscriptionSite;
use Nemundo\Workflow\App\Subscription\Site\SubscriptionSite;
use Nemundo\Workflow\App\Survey\Site\SurveySite;
use Nemundo\Workflow\App\Task\Site\Admin\TaskAdminSite;
use Nemundo\Workflow\App\Task\Site\TaskSite;
use Nemundo\Workflow\App\ToDo\Site\ToDoDoneSite;
use Nemundo\Workflow\App\Widget\Site\WidgetSite;
use Nemundo\Workflow\App\Wiki\Site\WikiSite;
use Nemundo\Workflow\App\Workflow\Site\Process\ProcessSite;
use Nemundo\Workflow\App\Workflow\Site\WorkflowSearchSite;
use Nemundo\Workflow\Usergroup\CollaborationUsergroup;

class CollaborationSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Collaboration';
        $this->url = 'collaboration';
        $this->restricted = true;
        $this->addRestrictedUsergroup(new CollaborationUsergroup());

        new InboxSite($this);
        new InboxStreamSite($this);
        new WorkflowSearchSite($this);
        new ProcessSite($this);

        new TaskSite($this);
        new TaskAdminSite($this);

        new ToDoDoneSite($this);
        new NewsSite($this);

        new MessageSite($this);
        new WikiSite($this);

        new ContentTypeSite($this);
        //new ContentTreeSite($this);

        new SearchEngineSite($this);
        new WidgetSite($this);

        new SubscriptionSite($this);
        new MySubscriptionSite($this);
        new MyFavoriteSite($this);

        new StreamSite($this);

        new SurveySite($this);

    }


    public function loadContent()
    {

    }

}