<?php

namespace Nemundo\Workflow\App\Assignment\Builder;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Package\ResponsiveMail\ResponsiveActionMailMessage;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Information\UserInformation;
use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\Workflow\App\Assignment\Data\Assignment\Assignment;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentDelete;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentUpdate;
use Nemundo\Workflow\App\Identification\Model\Identification;
use Nemundo\Workflow\App\MailConfig\Data\MailConfig\MailConfigValue;

class AssignmentBuilder extends AbstractBase
{

    /**
     * @var AbstractContentType|AbstractTreeContentType
     */
    public $contentType;

    /**
     * @var string
     */
    //public $subject;

    /**
     * @var string
     */
    public $message = '';

    /**
     * @var Date
     */
    public $deadline;

    /**
     * @var Identification
     */
    public $assignment;


    public function __construct(AbstractContentType $contentType = null)
    {
        $this->assignment = new Identification();
        $this->contentType = $contentType;
    }


    public function createUserAssignment($userId)
    {

        $this->assignment->setUserIdentification($userId);
        return $this;

    }


    public function createUsergroupAssignment(AbstractUsergroup $usergroup)
    {

        foreach ($usergroup->getUserList() as $userRow) {
            $this->createUserAssignment($userRow->id);
        }
        return $this;

    }

    public function createAssignment()
    {

        if (!$this->checkObject('contentType', $this->contentType, AbstractContentType::class)) {
            return;
        }

        $data = new Assignment();
        $data->contentTypeId = $this->contentType->contentId;
        $data->dataId = $this->contentType->dataId;
        $data->subject = $this->contentType->getSubject();


        $source = $this->contentType->contentLabel;
        if ($this->contentType->isObjectOfClass(AbstractTreeContentType::class)) {

            $parentType = $this->contentType->getParent();
            if ($parentType !== null) {
                $source = $parentType->getSubject();
            }

        }

        $data->source = $source;
        $data->message = $this->message;
        $data->assignment = $this->assignment;
        $data->assignmentText = $this->assignment->getValue();
        $data->deadline = $this->deadline;
        $data->save();

        $this->sendMail();

    }


    public function archiveAssignment()
    {

        $update = new AssignmentUpdate();
        $update->filter->andEqual($update->model->dataId, $this->contentType->dataId);
        $update->archive = true;
        $update->update();

    }


    public function removeAssignment()
    {

        $delete = new AssignmentDelete();
        $delete->filter->andEqual($delete->model->contentTypeId, $this->contentType->contentId);
        $delete->filter->andEqual($delete->model->dataId, $this->contentType->dataId);
        $delete->delete();

    }


    private function sendMail()
    {

        foreach ($this->assignment->getUserIdListFromIdentificationId() as $userId) {

            $userRow = (new UserReader())->getRowById($userId);

            $mailConfigValue = new MailConfigValue();
            $mailConfigValue->field = $mailConfigValue->model->assignmentMail;
            $mailConfigValue->filter->andEqual($mailConfigValue->model->userId, $userRow->id);
            $value = $mailConfigValue->getValue();

            if (($value) || ($value == '')) {

                $mail = new ResponsiveActionMailMessage();
                $mail->mailTo = $userRow->email;
                $mail->subject = $this->contentType->getSubject();
                $mail->actionText = (new Html($this->message))->getValue();
                $mail->actionLabel = 'Ansehen';
                $mail->actionUrlSite = $this->contentType->getViewSite();
                $mail->sendMail();

            }

        }

    }

}