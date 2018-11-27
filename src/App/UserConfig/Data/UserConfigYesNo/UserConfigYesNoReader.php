<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigYesNo;
class UserConfigYesNoReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var UserConfigYesNoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigYesNoModel();
}
/**
* @return UserConfigYesNoRow[]
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
* @return UserConfigYesNoRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return UserConfigYesNoRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new UserConfigYesNoRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}