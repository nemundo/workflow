<?php
namespace Nemundo\Workflow\App\Calendar\Data\Calendar;
class CalendarPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var CalendarModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new CalendarModel();
}
}