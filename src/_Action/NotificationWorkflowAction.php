<?php

namespace Nemundo\Workflow\Action;


use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\Workflow\App\Workflow\Builder\StatusChangeEvent;
use Nemundo\Workflow\Data\UserNotification\UserNotification;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Design\ResponsiveMail\ResponsiveActionMailMessage;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowItem;
use Nemundo\Workflow\Data\MailConfig\MailConfigValue;


class NotificationWorkflowAction extends AbstractWorkflowAction
{

    public function notificateUser($userId)
    {

        $data = new UserNotification();
        $data->statusChangeId = $this->changeEvent->statusChangeId;
        $data->userId = $userId;
        $data->save();

        $this->sendMail($userId);

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


    protected function sendMail($userId)
    {

        $count = new MailConfigValue();
        $count->field = $count->model->notificationMail;
        $count->filter->andEqual($count->model->userId, (new UserInformation())->getUserId());
        $value = $count->getValue();

        if (($value) || ($value == '')) {


            // Class WorkflowMail
            $userRow = (new UserReader())->getRowById($userId);


            $workflowItem = new WorkflowItem($this->changeEvent->workflowId);

            $process = $workflowItem->getProcess();

            $mail = new ResponsiveActionMailMessage();
            $mail->addTo($userRow->email);
            $mail->subject = $workflowItem->getTitle();
            $mail->actionText = $workflowItem->workflowStatus->getStatusText($this->changeEvent);
            $mail->actionLabel = 'Ansehen';
            $mail->actionUrlSite = $process->getItemSite($this->changeEvent->workflowId);
            $mail->sendMail();

        }

    }

}