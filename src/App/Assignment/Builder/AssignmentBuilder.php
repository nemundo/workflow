<?php

namespace Nemundo\Workflow\App\Assignment\Builder;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Package\ResponsiveMail\ResponsiveActionMailMessage;
use Nemundo\User\Data\User\UserReader;
use Nemundo\Workflow\App\Assignment\Data\Assignment\Assignment;
use Nemundo\Workflow\App\Identification\Model\Identification;

class AssignmentBuilder extends AbstractBase
{


    /**
     * @var AbstractContentType
     */
    public $contentType;

    /**
     * @var string
     */
    //public $dataId;

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $message;

    /**
     * @var Date
     */
    public $deadline;

    /**
     * @var Identification
     */
    public $assignment;


    public function __construct()
    {
        $this->assignment = new Identification();
    }


    public function createAssignment()
    {

        $data = new Assignment();
        $data->contentTypeId = $this->contentType->contentId;
        //$data->dataId = $this->dataId;
        $data->dataId = $this->contentType->dataId;
        $data->subject = $this->subject;
        $data->message = $this->message;
        $data->assignment = $this->assignment;
        $data->deadline = $this->deadline;
        $data->save();

        $this->sendMail();

    }


    private function sendMail()
    {

        foreach ($this->assignment->getUserIdListFromIdentificationId() as $userId) {

            $userRow = (new UserReader())->getRowById($userId);

            $mail = new ResponsiveActionMailMessage();
            $mail->addTo($userRow->email);
            $mail->subject = $this->contentType->getSubject();
            $mail->actionText = (new Html($this->message))->getValue();
            $mail->actionLabel = 'Ansehen';
            $mail->actionUrlSite = $this->contentType->getItemSite();
            $mail->sendMail();

        }

    }

}