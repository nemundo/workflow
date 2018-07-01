<?php

namespace Nemundo\Workflow\App\Inbox\Site;


use Nemundo\Design\FontAwesome\Icon\DeleteIcon;
use Nemundo\Design\FontAwesome\Site\AbstractIconSite;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlRedirect;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\App\Inbox\Data\Inbox\InboxUpdate;
use Nemundo\Workflow\App\Inbox\Parameter\InboxParameter;

class InboxArchiveSite extends AbstractIconSite
{

    /**
     * @var InboxArchiveSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'inbox-archive';
        $this->menuActive = false;
        $this->icon = new DeleteIcon();

    }


    protected function registerSite()
    {
        InboxArchiveSite::$site = $this;
    }

    public function loadContent()
    {


        $inboxId = (new InboxParameter())->getValue();

        $update = new InboxUpdate();
        $update->archive = true;
        $update->updateById($inboxId);

        (new UrlReferer())->redirect();


    }


}