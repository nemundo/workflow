<?php
namespace Nemundo\Workflow\App\Workflow\Data\StatusChange;
class StatusChangeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var StatusChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StatusChangeModel();
}
/**
* @return StatusChangeRow[]
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
* @return StatusChangeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return StatusChangeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new StatusChangeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}