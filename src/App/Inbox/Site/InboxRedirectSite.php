<?php

namespace Nemundo\Workflow\App\Inbox\Site;


use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlRedirect;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\App\Inbox\Data\Inbox\InboxReader;
use Nemundo\Workflow\App\Inbox\Data\Inbox\InboxUpdate;
use Nemundo\Workflow\App\Inbox\Parameter\InboxParameter;

class InboxRedirectSite extends AbstractSite
{

    /**
     * @var InboxRedirectSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'inbox-redirect';
        $this->menuActive = false;

    }


    protected function registerSite()
    {
        InboxRedirectSite::$site = $this;
    }

    public function loadContent()
    {


        $inboxId = (new InboxParameter())->getValue();

        $update = new InboxUpdate();
        $update->read = true;
        $update->updateById($inboxId);


        $inboxReader = new InboxReader();
        $inboxReader->model->loadContentType();
        $inboxRow = $inboxReader->getRowById($inboxId);

        $contentType = $inboxRow->contentType->getContentTypeClassObject();
        $contentType->dataId = $inboxRow->dataId;

        $site = $contentType->getItemSite();
        $site->redirect();


    }


}