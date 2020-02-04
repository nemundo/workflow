<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange;
class UserAssignmentChangeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var UserAssignmentChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserAssignmentChangeModel();
}
/**
* @return UserAssignmentChangeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return UserAssignmentChangeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return UserAssignmentChangeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new UserAssignmentChangeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}