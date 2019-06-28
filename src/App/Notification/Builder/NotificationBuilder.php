<?php

namespace Nemundo\Workflow\App\Notification\Builder;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Package\ResponsiveMail\ResponsiveActionMailMessage;
use Nemundo\User\Type\UserItemType;
use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\Workflow\App\Notification\Config\NotificationConfig;
use Nemundo\Workflow\App\Notification\Config\NotificationSendMailConfig;
use Nemundo\Workflow\App\Notification\Data\Notification\Notification;
use Nemundo\Workflow\App\Notification\Data\Notification\NotificationDelete;
use Nemundo\Workflow\App\Notification\Data\Notification\NotificationUpdate;

class NotificationBuilder extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $subject = '';
    // braucht es subject ???

    /**
     * @var string
     */
    public $message = '';

    /**
     * @var AbstractContentType
     */
    protected $contentType;


    public function __construct(AbstractContentType $contentType = null)
    {
        $this->contentType = $contentType;
    }


    protected function check()
    {

        if (!$this->checkObject('contentType', $this->contentType, AbstractContentType::class)) {
            exit;
        }

    }


    public function createUserNotification($userId)
    {

        $this->check();

        $data = new Notification();
        $data->contentTypeId = $this->contentType->contentId;
        $data->dataId = $this->contentType->dataId;
        $data->subject = $this->contentType->getSubject();
        $data->message = $this->message;
        $data->userId = $userId;
        $data->save();

        $this->sendMail($userId);

    }


    public function createUsergroupNotification(AbstractUsergroup $usergroup)
    {

        foreach ($usergroup->getUserList() as $userRow) {
            $this->createUserNotification($userRow->id);
        }

    }


    public function archiveNotification()
    {

        $update = new NotificationUpdate();
        $update->filter->andEqual($update->model->dataId, $this->contentType->dataId);
        $update->archive = true;
        $update->update();

    }


    public function removeNotification()
    {

        $delete = new NotificationDelete();
        $delete->filter->andEqual($delete->model->contentTypeId, $this->contentType->contentId);
        $delete->filter->andEqual($delete->model->dataId, $this->contentType->dataId);
        $delete->delete();

    }


    protected function sendMail($userId)
    {

        if (NotificationConfig::$sendMail) {

            //if ((new NotificationSendMailConfig)->getValue()) {
            if ((new NotificationSendMailConfig)->getValueByUserId($userId)) {
                $userType = new UserItemType($userId);

                $mail = new ResponsiveActionMailMessage();
                $mail->mailTo = $userType->email;
                $mail->subject = $this->contentType->getSubject();
                $mail->actionText = (new Html($this->message))->getValue();
                $mail->actionLabel = 'Ansehen';
                $mail->actionUrlSite = $this->contentType->getViewSite();
                $mail->sendMail();

            }
        }
    }

}