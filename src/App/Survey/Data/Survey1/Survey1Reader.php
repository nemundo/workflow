<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey1;
class Survey1Reader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var Survey1Model
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new Survey1Model();
}
/**
* @return Survey1Row[]
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
* @return Survey1Row
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return Survey1Row
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new Survey1Row($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}