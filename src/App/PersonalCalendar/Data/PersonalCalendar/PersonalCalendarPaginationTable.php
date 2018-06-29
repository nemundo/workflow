<?php
namespace Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar;
class PersonalCalendarPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var PersonalCalendarModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new PersonalCalendarModel();
}
}