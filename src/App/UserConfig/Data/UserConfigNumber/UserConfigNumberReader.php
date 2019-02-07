<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigNumber;
class UserConfigNumberReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var UserConfigNumberModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigNumberModel();
}
/**
* @return UserConfigNumberRow[]
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
* @return UserConfigNumberRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return UserConfigNumberRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new UserConfigNumberRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}
