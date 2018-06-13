<?php

namespace Nemundo\Workflow\Action;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\Workflow\Data\UserNotification\UserNotification;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Notification\WorkflowNotification;

class NotificationAction extends AbstractWorkflowAction
{

    /**
     * @var bool
     */
    public $sendMail = false;

    /**
     * @var string
     */
    /* private $statusChangeId;


     public function __construct($statusChangeId)
     {
         $this->statusChangeId = $statusChangeId;
     }*/


    public function notificateUser($userId)
    {

        $data = new UserNotification();
        $data->statusChangeId = $this->changeEvent->statusChangeId;
        $data->userId = $userId;
        $data->save();


        /*
        $notification = new WorkflowNotification();
        $notification->statusChangeId = $this->statusChangeId;
        $notification->userId = $userId;
        //$notification->sendMail = $sendMail;
        $notification->createNotification();


        /*
        $data = new UserNotification();
        //$data->statusChangeId = $this->statusChangeId;
        $data->userId = $userId;
        $data->save();
*/

        if ($this->sendMail) {
            // $this->sendMail($userId);
        }


    }


    public function notificateUsergroup(AbstractUsergroup $usergroup)
    {

        foreach ($usergroup->getUserList() as $userRow) {
            $this->notificateUser($userRow->id);
        }

    }


    public function notificateCreator()
    {

        $workflowRow = (new WorkflowReader())->getRowById($this->changeEvent->workflowId);
        $this->notificateUser($workflowRow->userId);

    }


}