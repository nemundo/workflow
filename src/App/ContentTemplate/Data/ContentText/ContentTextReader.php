<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentText;
class ContentTextReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ContentTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTextModel();
}
/**
* @return ContentTextRow[]
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
* @return ContentTextRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ContentTextRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ContentTextRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}