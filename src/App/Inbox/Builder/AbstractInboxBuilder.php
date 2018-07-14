<?php

namespace Nemundo\Workflow\App\Inbox\Builder;


use Nemundo\Design\ResponsiveMail\ResponsiveActionMailMessage;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Information\UserInformation;
use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\Workflow\App\Inbox\Data\Inbox\Inbox;
use Nemundo\App\Content\Builder\AbstractContentBuilder;
use Nemundo\App\Content\Redirect\AbstractContentRedirect;
use Nemundo\Workflow\Data\MailConfig\MailConfigValue;

abstract class AbstractInboxBuilder extends AbstractContentBuilder
{

    /**
     * @var string
     */
    //public $subject;

    /**
     * @var string
     */
    public $message;

    /**
     * @var string
     */
    public $userId;

    /**
     * @var AbstractContentRedirect
     */
    //public $contentRedirect;

    /**
     * @var string
     */
    //public $bookmarkId;


    public function __construct()
    {
        $this->loadInbox();
    }


    protected function loadInbox()
    {

    }


    public function createItem()
    {

        /*
        $data = new Inbox();
        $data->contentTypeId = $this->contentType->id;
        $data->dataId = $this->dataId;
        $data->subject = $this->subject;
        $data->userId = $this->userId;
        $data->save();*/

        $this->createUserInbox($this->userId);


    }


    public function createUserInbox($userId)
    {

        $this->check();

        $data = new Inbox();
        $data->contentTypeId = $this->contentType->id;
        //$data->contentRedirect = $this->contentRedirect->getClassName();
        $data->dataId = $this->dataId;
        //$data->bookmarkId = $this->bookmarkId;
        $data->subject = $this->contentType->getSubject($this->dataId);  // $this->subject;
        $data->message = $this->message;
        $data->userId = $userId;
        $data->save();

        //$this->sendMail($userId);

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
        $mail->subject = $this->subject;
        $mail->actionText = $this->message;
        $mail->actionLabel = 'Ansehen';
        $mail->actionUrlSite = $this->contentType->getItemSite($this->dataId);
        $mail->sendMail();


        //}

    }

}