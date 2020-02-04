<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange;
class SubjectChangeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var SubjectChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SubjectChangeModel();
}
/**
* @return SubjectChangeRow[]
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
* @return SubjectChangeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return SubjectChangeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new SubjectChangeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}