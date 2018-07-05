<?php

namespace Nemundo\Workflow\Site;


use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Inbox\Site\InboxSite;
use Nemundo\Workflow\App\Inbox\Site\InboxStreamSite;
use Nemundo\Workflow\App\Message\Site\MessageSite;
use Nemundo\Workflow\App\News\Site\NewsSite;
use Nemundo\Workflow\App\ToDo\Site\ToDoDoneSite;
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

        new ToDoDoneSite($this);
        new NewsSite($this);

        new MessageSite($this);

    }


    public function loadContent()
    {

    }

}