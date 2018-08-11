<?php
namespace Nemundo\Workflow\App\Identification\Data\IdentificationType;
class IdentificationTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var IdentificationTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IdentificationTypeModel();
}
/**
* @return IdentificationTypeRow[]
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
* @return IdentificationTypeRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return IdentificationTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new IdentificationTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}