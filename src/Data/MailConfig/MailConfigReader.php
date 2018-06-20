<?php
namespace Nemundo\Workflow\Data\MailConfig;
class MailConfigReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var MailConfigModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailConfigModel();
}
/**
* @return MailConfigRow[]
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
* @return MailConfigRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return MailConfigRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new MailConfigRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}