<?php
namespace Nemundo\Workflow\App\Wiki\Data\Hyperlink;
class HyperlinkReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var HyperlinkModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new HyperlinkModel();
}
/**
* @return HyperlinkRow[]
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
* @return HyperlinkRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return HyperlinkRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new HyperlinkRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}