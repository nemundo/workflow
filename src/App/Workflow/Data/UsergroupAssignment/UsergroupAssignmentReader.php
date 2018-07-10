<?php
namespace Nemundo\Workflow\App\Workflow\Data\UsergroupAssignment;
class UsergroupAssignmentReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var UsergroupAssignmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UsergroupAssignmentModel();
}
/**
* @return UsergroupAssignmentRow[]
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
* @return UsergroupAssignmentRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return UsergroupAssignmentRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new UsergroupAssignmentRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}