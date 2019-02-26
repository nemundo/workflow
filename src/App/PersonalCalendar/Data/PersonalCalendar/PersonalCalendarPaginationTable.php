<?php
namespace Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar;
class PersonalCalendarPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var PersonalCalendarModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new PersonalCalendarModel();
}
}