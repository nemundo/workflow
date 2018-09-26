<?php

namespace Nemundo\Workflow\App\Inbox\Builder;


use Nemundo\Core\Log\LogMessage;
use Nemundo\Package\ResponsiveMail\ResponsiveActionMailMessage;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\Workflow\App\Inbox\Data\Inbox\Inbox;
use Nemundo\App\Content\Builder\AbstractContentBuilder;


abstract class AbstractInboxBuilder extends AbstractContentBuilder
{

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $message;


    public function __construct()
    {
        $this->loadInbox();
    }


    protected function loadInbox()
    {

    }


    public function createItem()
    {

        (new LogMessage())->writeError('Invalid createItem Function');


    }


    public function createUserInbox($userId)
    {

        $this->check();

        /*
        $subject = $this->subject;

        if ($subject == null) {
            $subject = $this->contentType->getSubject($this->dataId);
        }*/


        $data = new Inbox();
        $data->contentTypeId = $this->contentType->contentId;
        $data->dataId = $this->contentType->dataId;
        //$data->subject =  $subject;
        $data->message = $this->message;
        $data->userId = $userId;
        $data->save();

        $this->sendMail($userId);

    }


    public function createUsergroupInbox(AbstractUsergroup $usergroup)
    {

        foreach ($usergroup->getUserList() as $userRow) {
            $this->createUserInbox($userRow->id);
        }

    }


    protected function sendMail($userId)
    {

        /*
        $count = new MailConfigValue();
        $count->field = $count->model->notificationMail;
        $count->filter->andEqual($count->model->userId, (new UserInformation())->getUserId());
        $value = $count->getValue();

        if (($value) || ($value == '')) {*/

        $userRow = (new UserReader())->getRowById($userId);

        $mail = new ResponsiveActionMailMessage();
        $mail->addTo($userRow->email);
        $mail->subject = $this->contentType->getSubject();
        $mail->actionText = $this->message;
        $mail->actionLabel = 'Ansehen';
        $mail->actionUrlSite = $this->contentType->getItemSite();
        $mail->sendMail();


        //}

    }

}