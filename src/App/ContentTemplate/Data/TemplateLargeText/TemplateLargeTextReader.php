<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateLargeText;
class TemplateLargeTextReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var TemplateLargeTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TemplateLargeTextModel();
}
/**
* @return TemplateLargeTextRow[]
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
* @return TemplateLargeTextRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return TemplateLargeTextRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new TemplateLargeTextRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}