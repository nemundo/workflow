<?php
namespace Nemundo\Workflow\App\Subscription\Data\ProcessSubscription;
class ProcessSubscriptionReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ProcessSubscriptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ProcessSubscriptionModel();
}
/**
* @return ProcessSubscriptionRow[]
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
* @return ProcessSubscriptionRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ProcessSubscriptionRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ProcessSubscriptionRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}