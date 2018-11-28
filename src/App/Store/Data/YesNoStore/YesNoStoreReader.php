<?php
namespace Nemundo\Workflow\App\Store\Data\YesNoStore;
class YesNoStoreReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var YesNoStoreModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new YesNoStoreModel();
}
/**
* @return YesNoStoreRow[]
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
* @return YesNoStoreRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return YesNoStoreRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new YesNoStoreRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}