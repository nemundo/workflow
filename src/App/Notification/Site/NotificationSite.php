<?php

namespace Nemundo\Workflow\App\Notification\Site;

use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;

class NotificationSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Notification';
        $this->url = 'notification';

        new NotificationRedirectSite($this);
        new NotificationArchiveSite($this);

    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $page->render();


    }
}