<?php
namespace Nemundo\Workflow\App\Assignment\Data\AssignmentFilter;
class AssignmentFilterReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var AssignmentFilterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AssignmentFilterModel();
}
/**
* @return AssignmentFilterRow[]
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
* @return AssignmentFilterRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return AssignmentFilterRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new AssignmentFilterRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}