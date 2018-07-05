<?php
namespace Nemundo\Workflow\App\Message\Data\MessageItem;
class MessageItemReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var MessageItemModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MessageItemModel();
}
/**
* @return MessageItemRow[]
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
* @return MessageItemRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return MessageItemRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new MessageItemRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}