<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamType;
class StreamTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var StreamTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamTypeModel();
}
/**
* @return StreamTypeRow[]
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
* @return StreamTypeRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return StreamTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new StreamTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}