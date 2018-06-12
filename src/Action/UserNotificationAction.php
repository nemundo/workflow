<?php

namespace Nemundo\Workflow\Action;


use Nemundo\Workflow\Data\UserNotification\UserNotification;
use Nemundo\Workflow\Notification\WorkflowNotification;

class UserNotificationAction extends AbstractWorkflowAction
{


    public function notificateUser($userId) {

        /*$notification = new WorkflowNotification();
        $notification->statusChangeId = $this->statusChangeId;
        $notification->userId = $userId;
        $notification->sendMail =  $sendMail;
        $notification->createNotification();

        WorkflowNotification::class*/


        $data = new UserNotification();
        $data->statusChangeId = $this->statusChangeId;
        $data->userId = $this->userId;
        $data->save();

        if ($this->sendMail) {
            // $this->sendMail($userId);
        }



    }



}