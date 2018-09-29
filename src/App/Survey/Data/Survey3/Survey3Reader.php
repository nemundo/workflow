<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey3;
class Survey3Reader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var Survey3Model
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new Survey3Model();
}
/**
* @return Survey3Row[]
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
* @return Survey3Row
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return Survey3Row
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new Survey3Row($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}