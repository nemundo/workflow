<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigText;
class UserConfigTextReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var UserConfigTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserConfigTextModel();
}
/**
* @return UserConfigTextRow[]
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
* @return UserConfigTextRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return UserConfigTextRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new UserConfigTextRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}