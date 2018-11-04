<?php

namespace Nemundo\Workflow\App\Notification\Site;


use Nemundo\Web\Site\AbstractSite;
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

        $this->url = 'notification-redirect';
        $this->menuActive = false;

    }


    protected function registerSite()
    {
        NotificationRedirectSite::$site = $this;
    }

    public function loadContent()
    {

        $notificationId = (new NotificationParameter())->getValue();

        $update = new NotificationUpdate();
        $update->read = true;
        $update->updateById($notificationId);

        $notificationReader = new NotificationReader();
        $notificationReader->model->loadContentType();
        $notificationRow = $notificationReader->getRowById($notificationId);

        $contentType = $notificationRow->contentType->getContentTypeClassObject();
        $contentType->dataId = $notificationRow->dataId;

        $site = $contentType->getViewSite();
        $site->redirect();

    }

}