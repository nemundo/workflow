<?php
namespace Nemundo\Workflow\App\Calendar\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class CalendarCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\Calendar\Data\Calendar\CalendarModel());
}
}