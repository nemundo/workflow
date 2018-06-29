<?php
namespace Nemundo\Workflow\App\Calendar\Data\Calendar;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class CalendarTable extends BootstrapModelTable {
/**
* @var CalendarModel
*/
public $model;

protected function loadCom() {
$this->model = new CalendarModel();
}
}