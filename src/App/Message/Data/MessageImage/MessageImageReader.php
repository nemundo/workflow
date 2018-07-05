<?php
namespace Nemundo\Workflow\App\Message\Data\MessageImage;
class MessageImageReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var MessageImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MessageImageModel();
}
/**
* @return MessageImageRow[]
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
* @return MessageImageRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return MessageImageRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new MessageImageRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}