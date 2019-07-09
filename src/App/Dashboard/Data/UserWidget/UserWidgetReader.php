<?php
namespace Nemundo\Workflow\App\Dashboard\Data\UserWidget;
class UserWidgetReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var UserWidgetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserWidgetModel();
}
/**
* @return UserWidgetRow[]
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
* @return UserWidgetRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return UserWidgetRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new UserWidgetRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}