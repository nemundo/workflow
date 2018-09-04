<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SendInbox;
class SendInboxReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var SendInboxModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SendInboxModel();
}
/**
* @return SendInboxRow[]
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
* @return SendInboxRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return SendInboxRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new SendInboxRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}