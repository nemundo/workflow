<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
class StreamGroup MemberReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var StreamGroup MemberModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StreamGroup MemberModel();
}
/**
* @return StreamGroup MemberRow[]
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
* @return StreamGroup MemberRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return StreamGroup MemberRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new StreamGroup MemberRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}