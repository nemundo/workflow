<?php
namespace Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar;
class PersonalCalendarPaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var PersonalCalendarModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PersonalCalendarModel();
}
/**
* @return PersonalCalendarRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new PersonalCalendarRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}