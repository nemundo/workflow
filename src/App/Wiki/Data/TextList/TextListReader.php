<?php
namespace Nemundo\Workflow\App\Wiki\Data\TextList;
class TextListReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var TextListModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextListModel();
}
/**
* @return TextListRow[]
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
* @return TextListRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return TextListRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new TextListRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}