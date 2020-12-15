<?php

namespace Nemundo\Workflow\App\Notification\Site;


use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Workflow\App\Notification\Data\Notification\NotificationUpdate;
use Nemundo\Workflow\App\Notification\Parameter\NotificationParameter;

class NotificationArchiveSite extends AbstractIconSite
{

    /**
     * @var NotificationArchiveSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'notification-archive';
        $this->menuActive = false;
        $this->icon = new DeleteIcon();

    }


    protected function registerSite()
    {
        NotificationArchiveSite::$site = $this;
    }

    public function loadContent()
    {

        $notificationId = (new NotificationParameter())->getValue();

        $update = new NotificationUpdate();
        $update->archive = true;
        $update->updateById($notificationId);

        (new UrlReferer())->redirect();

    }

}