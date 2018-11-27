<?php

namespace Nemundo\Workflow\App\PersonalCalendar\Form;


use Nemundo\User\Type\UserSessionType;
use Nemundo\Workflow\App\Calendar\Builder\CalendarBuilder;
use Nemundo\Workflow\App\Identification\Type\UserIdentificationType;
use Nemundo\Workflow\App\PersonalCalendar\Content\PersonalCalendarContentType;
use Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar\PersonalCalendarForm;
use Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar\PersonalCalendarReader;

class PersonalCalendarBuilderForm extends PersonalCalendarForm
{

    protected function onSubmit()
    {
        $dataId = parent::onSubmit();

        $row = (new PersonalCalendarReader())->getRowById($dataId);


        $builder = new CalendarBuilder();
        $builder->identificationType = new UserIdentificationType();
        $builder->identificationId = (new UserSessionType())->userId;
        $builder->contentType = new PersonalCalendarContentType();
        $builder->dataId = $dataId;
        $builder->date = $row->date;
        $builder->event = $row->subject;
        $builder->createItem();

    }

}