<?php
namespace Nemundo\Workflow\App\Dashboard\Data\DashboardContentType;
class DashboardContentTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var DashboardContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DashboardContentTypeModel();
}
/**
* @return DashboardContentTypeRow[]
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
* @return DashboardContentTypeRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return DashboardContentTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new DashboardContentTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}