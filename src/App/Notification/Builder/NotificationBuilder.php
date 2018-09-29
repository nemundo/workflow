<?php

namespace Nemundo\Workflow\App\Notification\Builder;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\Workflow\App\Notification\Data\Notification\Notification;
use Nemundo\Workflow\App\Notification\Type\AbstractNotificationType;

class NotificationBuilder extends AbstractBaseClass
{

    /**
     * @var AbstractNotificationType
     */
    public $notificationType;

    /**
     * @var string
     */
    public $dataId;


    public function createUserNotification($userId) {

    }

    public function createUsergroupNotification(AbstractUsergroup $usergroup) {

    }


    public function createNotification()
    {

        $data = new Notification();
        $data->notificationTypeId = $this->notificationType->id;
        $data->dataId = $this->dataId;
        $data->save();


    }


}