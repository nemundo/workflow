<?php
namespace Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractPersonalCalendarAction extends AbstractModelAction {
/**
* @return PersonalCalendarRow
*/
protected function getRow() {
$reader = new PersonalCalendarReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}