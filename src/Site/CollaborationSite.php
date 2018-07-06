<?php

namespace Nemundo\Workflow\Site;


use Nemundo\App\Content\Site\ContentTypeSite;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Inbox\Site\InboxSite;
use Nemundo\Workflow\App\Inbox\Site\InboxStreamSite;
use Nemundo\Workflow\App\Message\Site\MessageSite;
use Nemundo\Workflow\App\News\Site\NewsSite;
use Nemundo\Workflow\App\SearchEngine\Site\SearchEngineSite;
use Nemundo\Workflow\App\Task\Site\TaskSite;
use Nemundo\Workflow\App\ToDo\Site\ToDoDoneSite;
use Nemundo\Workflow\App\Wiki\Site\WikiSite;
use Nemundo\Workflow\App\Workflow\Site\WorkflowSearchSite;

class CollaborationSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Collaboration';
        $this->url = 'collaboration';


        new InboxSite($this);
        new InboxStreamSite($this);
        new WorkflowSearchSite($this);

        new TaskSite($this);

        new ToDoDoneSite($this);
        new NewsSite($this);

        new MessageSite($this);
        new WikiSite($this);
        new ContentTypeSite($this);
        new SearchEngineSite($this);

    }


    public function loadContent()
    {

    }

}