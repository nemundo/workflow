<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationFilter;
class NotificationFilterReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var NotificationFilterModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NotificationFilterModel();
}
/**
* @return NotificationFilterRow[]
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
* @return NotificationFilterRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return NotificationFilterRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new NotificationFilterRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}