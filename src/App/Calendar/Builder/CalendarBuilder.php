<?php

namespace Nemundo\Workflow\App\Calendar\Builder;


use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Workflow\App\Calendar\Data\Calendar\Calendar;
use Nemundo\Workflow\Content\Builder\AbstractIdentificationBuilder;

class CalendarBuilder extends AbstractIdentificationBuilder
{

    /**
     * @var Date
     */
    public $date;

    /**
     * @var
     */
    public $event;


    public function createItem()
    {

        /*
        if (!$this->checkObject('identificationTpe', $this->identificationType, AbstractIdentificationType::class)) {
            return;
        }*/

        $data = new Calendar();
        $data->identificationTypeId = $this->identificationType->id;
        $data->identificationId = $this->identificationId;
        $data->date = $this->date;
        $data->event = $this->event;
        $data->dataId = $this->dataId;
        $data->contentTypeId = $this->contentType->id;
        $data->save();

    }


}