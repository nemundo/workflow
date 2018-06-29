<?php
namespace Nemundo\Workflow\App\Widget\Data\WidgetType;
class WidgetTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var WidgetTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WidgetTypeModel();
}
/**
* @return WidgetTypeRow[]
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
* @return WidgetTypeRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return WidgetTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new WidgetTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}