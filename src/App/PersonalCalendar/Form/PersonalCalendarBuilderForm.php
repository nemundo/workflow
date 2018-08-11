<?php

namespace Nemundo\Workflow\App\PersonalCalendar\Form;


use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\App\Calendar\Builder\CalendarBuilder;
use Nemundo\Workflow\App\PersonalCalendar\Content\PersonalCalendarContentType;
use Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar\PersonalCalendarForm;
use Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar\PersonalCalendarReader;
use Nemundo\Workflow\App\Identification\Type\UserIdentificationType;

class PersonalCalendarBuilderForm extends PersonalCalendarForm
{

    protected function onSubmit()
    {
       $dataId = parent::onSubmit();

        $row = (new PersonalCalendarReader())->getRowById($dataId);


        $builder = new CalendarBuilder();
        $builder->identificationType = new UserIdentificationType();
        $builder->identificationId = (new UserInformation())->getUserId();
        $builder->contentType = new PersonalCalendarContentType();
        $builder->dataId = $dataId;
        $builder->date = $row->date;
        $builder->event = $row->subject;
        $builder->createItem();

    }

}