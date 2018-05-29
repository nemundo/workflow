<?php
namespace Nemundo\Workflow\Data\UserAssignment;
class UserAssignmentReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var UserAssignmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserAssignmentModel();
}
/**
* @return UserAssignmentRow[]
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
* @return UserAssignmentRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return UserAssignmentRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new UserAssignmentRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}