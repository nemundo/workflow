<?php

namespace Nemundo\Workflow\Notification;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\Data\UserNotification\UserNotification;

class WorkflowNotification extends AbstractBase
{

    /**
     * @var string
     */
    public $workflowId;

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
        $data->workflowId = $this->workflowId;
        $data->userId = $this->userId;
        $data->save();

        if ($this->sendMail) {
           // $this->sendMail($userId);
        }



    }


}