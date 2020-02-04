<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiPage;
class WikiPageReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var WikiPageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WikiPageModel();
}
/**
* @return WikiPageRow[]
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
* @return WikiPageRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return WikiPageRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new WikiPageRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}