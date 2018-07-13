<?php
namespace Nemundo\Workflow\App\Survey\Data\UmfrageStart;
class UmfrageStartReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var UmfrageStartModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UmfrageStartModel();
}
/**
* @return UmfrageStartRow[]
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
* @return UmfrageStartRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return UmfrageStartRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new UmfrageStartRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}