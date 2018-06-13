<?php

namespace Nemundo\Workflow\Notification;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\Data\UserNotification\UserNotification;

class WorkflowNotification extends AbstractBase
{

    /**
     * @var string
     */
    public $statusChangeId;

    /**
     * @var string
     */
    public $userId;

    /**
     * @var bool
     */
    public $sendMail = false;


    public function createNotification() {

        $data = new UserNotification();
        $data->statusChangeId = $this->statusChangeId;
        $data->userId = $this->userId;
        $data->save();

        if ($this->sendMail) {
           // $this->sendMail($userId);
        }

    }


}