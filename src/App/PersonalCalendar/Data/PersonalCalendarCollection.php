<?php
namespace Nemundo\Workflow\App\PersonalCalendar\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class PersonalCalendarCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar\PersonalCalendarModel());
}
}