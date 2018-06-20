<?php

namespace Nemundo\Workflow\Site\Notification;


use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\Data\UserNotification\UserNotificationDelete;
use Nemundo\Workflow\Parameter\NotificationParameter;

class ProcessNotificationDeleteSite extends AbstractSite
{

    /**
     * @var ProcessNotificationDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'process-notification-delete';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        ProcessNotificationDeleteSite::$site = $this;
    }


    public function loadContent()
    {

        //$notificationId = (new NotificationParameter())->getValue();
        //(new UserNotificationDelete())->deleteById($notificationId);

        $delete = new UserNotificationDelete();
        $delete->filter->andEqual($delete->model->userId);
        $delete->delete();


        (new UrlReferer())->redirect();

    }

}