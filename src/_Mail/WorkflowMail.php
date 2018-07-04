<?php

namespace Nemundo\Workflow\Mail;


use Nemundo\User\Usergroup\AbstractUsergroup;

class WorkflowMail
{

    /**
     * @var string
     */
    public $userId;



    public function sendToUsergroup(AbstractUsergroup $usergroup) {

        foreach ($usergroup->getUserList() as $userRow) {
            $this->sendMail($userRow->id);
        }


    }


    public function sendMail($userId) {


        // Class WorkflowMail

        $userRow = (new UserReader())->getRowById($userId);

        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadProcess();
        $workflowRow = $workflowReader->getRowById($this->workflowId);

        $process = $workflowRow->process->getProcessClassObject();

        // WorkflowView aus baseModel


        $mail = new ResponsiveActionMailMessage();
        $mail->addTo($userRow->email);
        $mail->subject = $workflowRow->workflowNumber . ': ' . $workflowRow->subject;
        $mail->actionText = $this->workflowStatusText;
        $mail->actionUrlSite = $process->getApplicationSite($this->workflowId);
        $mail->sendMail();



    }




}