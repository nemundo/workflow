<?php
namespace Nemundo\Workflow\App\Store\Data\LargeTextStore;
class LargeTextStoreReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var LargeTextStoreModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LargeTextStoreModel();
}
/**
* @return LargeTextStoreRow[]
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
* @return LargeTextStoreRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return LargeTextStoreRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new LargeTextStoreRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}