<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroup;
class StreamGroupReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var StreamGroupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamGroupModel();
}
/**
* @return StreamGroupRow[]
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
* @return StreamGroupRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return StreamGroupRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new StreamGroupRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}