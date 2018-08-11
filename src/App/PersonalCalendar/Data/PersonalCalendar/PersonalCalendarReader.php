<?php
namespace Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar;
class PersonalCalendarReader extends \Nemundo\Model\Reader\ModelDataReader {
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
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return PersonalCalendarRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return PersonalCalendarRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new PersonalCalendarRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}