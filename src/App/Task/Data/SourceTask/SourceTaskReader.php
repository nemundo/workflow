<?php
namespace Nemundo\Workflow\App\Task\Data\SourceTask;
class SourceTaskReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var SourceTaskModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceTaskModel();
}
/**
* @return SourceTaskRow[]
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
* @return SourceTaskRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return SourceTaskRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new SourceTaskRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}