<?php
namespace Nemundo\Workflow\App\PersonalCalendar\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class Personal CalendarCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar\PersonalCalendarModel());
}
}