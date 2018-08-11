<?php

namespace Nemundo\Workflow\Site\Notification;


use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Data\UserNotification\UserNotificationReader;
use Nemundo\Workflow\Data\UserNotification\UserNotificationUpdate;
use Nemundo\Workflow\Parameter\NotificationParameter;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;

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

        $update = new UserNotificationUpdate();
        $update->read = true;
        $update->updateById($notificationId);

        $notificationReader = new UserNotificationReader();
        $notificationReader->model->loadStatusChange();
        $notificationReader->model->statusChange->loadWorkflow();
        $notificationReader->model->statusChange->workflow->loadProcess();
        $notificationRow = $notificationReader->getRowById($notificationId);

        $process = $notificationRow->statusChange->workflow->process->getProcessClassObject();

        $site = $process->getItemSite();
        $site->addParameter(new WorkflowParameter($notificationRow->statusChange->workflowId));
        $site->redirect();

    }

}