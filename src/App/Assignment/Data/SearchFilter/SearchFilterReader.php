<?php
namespace Nemundo\Workflow\App\Assignment\Data\SearchFilter;
class SearchFilterReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var SearchFilterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SearchFilterModel();
}
/**
* @return SearchFilterRow[]
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
* @return SearchFilterRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return SearchFilterRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new SearchFilterRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}