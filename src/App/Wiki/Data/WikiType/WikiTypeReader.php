<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiType;
class WikiTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var WikiTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WikiTypeModel();
}
/**
* @return WikiTypeRow[]
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
* @return WikiTypeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return WikiTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new WikiTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}