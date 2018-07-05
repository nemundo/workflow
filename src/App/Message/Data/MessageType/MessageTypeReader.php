<?php
namespace Nemundo\Workflow\App\Message\Data\MessageType;
class MessageTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var MessageTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MessageTypeModel();
}
/**
* @return MessageTypeRow[]
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
* @return MessageTypeRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return MessageTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new MessageTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}