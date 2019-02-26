<?php
namespace Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class PersonalCalendarTable extends BootstrapModelTable {
/**
* @var PersonalCalendarModel
*/
public $model;

protected function loadContainer() {
$this->model = new PersonalCalendarModel();
}
}