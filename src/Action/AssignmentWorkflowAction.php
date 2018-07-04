<?php

namespace Nemundo\Workflow\Action;


use Nemundo\Design\ResponsiveMail\ResponsiveActionMailMessage;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Information\UserInformation;
use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\Workflow\Builder\StatusChangeEvent;
use Nemundo\Workflow\Builder\WorkflowItem;
use Nemundo\Workflow\Data\MailConfig\MailConfigValue;
use Nemundo\Workflow\Data\UserAssignment\UserAssignment;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentDelete;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentUpdate;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignment;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignmentDelete;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignmentUpdate;

class AssignmentWorkflowAction extends AbstractWorkflowAction
{


    public function assignUser($userId)
    {

        $data = new UserAssignment();
        $data->ignoreIfExists = true;
        $data->workflowId = $this->changeEvent->workflowId;
        $data->userId = $userId;
        $data->save();

        $this->sendMail($userId);

        return $this;

    }


    public function assignUsergroup(AbstractUsergroup $usergroup)
    {

        $data = new UsergroupAssignment();
        $data->ignoreIfExists = true;
        $data->workflowId = $this->changeEvent->workflowId;
        $data->usergroupId = $usergroup->id;
        $data->save();

        foreach ($usergroup->getUserList() as $userRow) {
            $this->sendMail($userRow->id);
        }

        return $this;

    }


    public function clearUserAssignment()
    {

        /*
        $delete = new UserAssignmentDelete();
        $delete->filter->andEqual($delete->model->workflowId, $this->changeEvent->workflowId);
        $delete->delete();*/

        $update = new UserAssignmentUpdate();
        $update->delete = true;
        $update->filter->andEqual($update->model->workflowId, $this->changeEvent->workflowId);
        $update->update();

        return $this;

    }


    public function clearUsergroupAssignment()
    {

        /*
        $delete = new UsergroupAssignmentDelete();
        $delete->filter->andEqual($delete->model->workflowId, $this->changeEvent->workflowId);
        $delete->delete();*/

        $update = new UsergroupAssignmentUpdate();
        $update->delete = true;
        $update->filter->andEqual($update->model->workflowId, $this->changeEvent->workflowId);
        $update->update();

        return $this;

    }


    public function clearUsergroupUserAssignment()
    {
        $this->clearUsergroupAssignment();
        $this->clearUserAssignment();

        return $this;

    }


    protected function sendMail($userId)
    {

        $count = new MailConfigValue();
        $count->field = $count->model->assignmentMail;  // notificationMail;
        $count->filter->andEqual($count->model->userId, (new UserInformation())->getUserId());
        $value = $count->getValue();

        if (($value) || ($value == '')) {


            // Class WorkflowMail
            // Item

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