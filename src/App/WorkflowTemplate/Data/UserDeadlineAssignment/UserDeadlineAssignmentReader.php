<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserDeadlineAssignment;
class UserDeadlineAssignmentReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var UserDeadlineAssignmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserDeadlineAssignmentModel();
}
/**
* @return UserDeadlineAssignmentRow[]
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
* @return UserDeadlineAssignmentRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return UserDeadlineAssignmentRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new UserDeadlineAssignmentRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}