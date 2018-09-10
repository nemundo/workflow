<?php

namespace Nemundo\Workflow\App\Assignment\Builder;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\DateTime\Date;
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
    public $dataId;

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
        $data->contentTypeId = $this->contentType->objectId;
        $data->dataId = $this->dataId;
        $data->subject = $this->subject;
        $data->message = $this->message;
        $data->assignment = $this->assignment;
        $data->deadline = $this->deadline;
        $data->save();




    }


    private function sendMail($userId) {


        /*
         $mail = new ResponsiveActionMailMessage();
         $mail->addTo($user->email);
         $mail->subject = 'Phase Freigabe Anforderung: ' . $projektPhaseRow->projekt->projekt;

         $mail->actionText = 'Projekt Abwicklung benötigt eine Phasen Freigebe.';
         $mail->actionLabel = 'Ansehen';
         $mail->actionUrlSite = clone(ProzesssteuerungConfig::$site->projekt);
         $mail->actionUrlSite->addParameter(new ProjektParameter($projektPhaseRow->projektId));

         $mail->sendMail();*/



    }



}