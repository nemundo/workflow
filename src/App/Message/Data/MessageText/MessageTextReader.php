<?php
namespace Nemundo\Workflow\App\Message\Data\MessageText;
class MessageTextReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var MessageTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MessageTextModel();
}
/**
* @return MessageTextRow[]
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
* @return MessageTextRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return MessageTextRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new MessageTextRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}