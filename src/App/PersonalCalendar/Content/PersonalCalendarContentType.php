<?php

namespace Nemundo\Workflow\App\PersonalCalendar\Content;


use Nemundo\Workflow\Content\Type\AbstractContentType;

class PersonalCalendarContentType extends AbstractContentType
{

    protected function loadType()
    {
        $this->name = 'Personal Calendar';
        $this->id = '5d2054e4-1216-477c-90fa-6e5419dd1b57';
    }

}