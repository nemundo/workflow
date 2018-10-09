<?php

namespace Nemundo\Workflow\App\Notification\Builder;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\Workflow\App\Notification\Data\Notification\Notification;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Package\ResponsiveMail\ResponsiveActionMailMessage;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\App\Inbox\Data\Inbox\Inbox;
use Nemundo\App\Content\Builder\AbstractContentBuilder;
use Nemundo\Workflow\App\MailConfig\Data\MailConfig\MailConfigValue;

class NotificationBuilder extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $subject = '';

    /**
     * @var string
     */
    public $message = '';


    /**
     * @var AbstractContentType
     */
    public $contentType;


   // abstract public function createItem();


    protected function check()
    {

        if (!$this->checkObject('contentType', $this->contentType, AbstractContentType::class)) {
            exit;
        }


    }







    public function createUserInbox($userId)
    {

        $this->check();

        $data = new Notification();  // Inbox();
        $data->contentTypeId = $this->contentType->contentId;
        $data->dataId = $this->contentType->dataId;
        $data->subject = $this->contentType->getSubject();
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

        $mailConfigValue = new MailConfigValue();
        $mailConfigValue->field = $mailConfigValue->model->inboxMail;
        $mailConfigValue->filter->andEqual($mailConfigValue->model->userId, (new UserInformation())->getUserId());
        $value = $mailConfigValue->getValue();


        if (($value) || ($value == '')) {

            $userRow = (new UserReader())->getRowById($userId);

            $mail = new ResponsiveActionMailMessage();
            $mail->addTo($userRow->email);
            $mail->subject = $this->contentType->getSubject();
            $mail->actionText = (new Html($this->message))->getValue();
            $mail->actionLabel = 'Ansehen';
            $mail->actionUrlSite = $this->contentType->getViewSite();
            $mail->sendMail();

        }

    }


}