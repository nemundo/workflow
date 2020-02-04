<?php
namespace Nemundo\Workflow\App\Workflow\Data\Workflow;
class WorkflowReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var WorkflowModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowModel();
}
/**
* @return WorkflowRow[]
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
* @return WorkflowRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return WorkflowRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new WorkflowRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}