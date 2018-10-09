<?php

namespace Nemundo\Workflow\App\Notification\Site;


use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlRedirect;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\App\Inbox\Data\Inbox\InboxReader;
use Nemundo\Workflow\App\Inbox\Data\Inbox\InboxUpdate;
use Nemundo\Workflow\App\Inbox\Parameter\InboxParameter;
use Nemundo\Workflow\App\Notification\Data\Notification\NotificationReader;
use Nemundo\Workflow\App\Notification\Data\Notification\NotificationUpdate;
use Nemundo\Workflow\App\Notification\Parameter\NotificationParameter;

class NotificationRedirectSite extends AbstractSite
{

    /**
     * @var NotificationRedirectSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'inbox-redirect';
        $this->menuActive = false;

    }


    protected function registerSite()
    {
      NotificationRedirectSite::$site = $this;
    }

    public function loadContent()
    {


        $notificationId = (new NotificationParameter())->getValue();

        $update = new NotificationUpdate();  // InboxUpdate();
        $update->read = true;
        $update->updateById($notificationId);


        $inboxReader = new NotificationReader();  // InboxReader();
        $inboxReader->model->loadContentType();
        $inboxRow = $inboxReader->getRowById($notificationId);

        $contentType = $inboxRow->contentType->getContentTypeClassObject();
        $contentType->dataId = $inboxRow->dataId;

        $site = $contentType->getViewSite();
        $site->redirect();


    }


}