<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigUniqueId;
class UserConfigUniqueIdReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var UserConfigUniqueIdModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigUniqueIdModel();
}
/**
* @return UserConfigUniqueIdRow[]
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
* @return UserConfigUniqueIdRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return UserConfigUniqueIdRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new UserConfigUniqueIdRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}