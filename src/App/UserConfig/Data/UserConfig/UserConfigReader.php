<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfig;
class UserConfigReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var UserConfigModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigModel();
}
/**
* @return UserConfigRow[]
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
* @return UserConfigRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return UserConfigRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new UserConfigRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}