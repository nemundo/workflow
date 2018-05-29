<?php
namespace Nemundo\Workflow\Data\WorkflowStatusChange;
class WorkflowStatusChangeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var WorkflowStatusChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowStatusChangeModel();
}
/**
* @return WorkflowStatusChangeRow[]
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
* @return WorkflowStatusChangeRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return WorkflowStatusChangeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new WorkflowStatusChangeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}