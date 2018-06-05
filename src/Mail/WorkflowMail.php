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





    }




}