<?php

namespace Nemundo\Workflow\Site\Notification;


use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\Data\UserNotification\UserNotificationDelete;
use Nemundo\Workflow\Data\UserNotification\UserNotificationUpdate;
use Nemundo\Workflow\Parameter\NotificationParameter;

class NotificationDeleteSite extends AbstractSite
{

    /**
     * @var NotificationDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'notification-delete';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        NotificationDeleteSite::$site = $this;
    }


    public function loadContent()
    {

        $notificationId = (new NotificationParameter())->getValue();
        //(new UserNotificationDelete())->deleteById($notificationId);

        $update = new UserNotificationUpdate();
        $update->delete = true;
        $update->updateById($notificationId);

        (new UrlReferer())->redirect();

    }

}