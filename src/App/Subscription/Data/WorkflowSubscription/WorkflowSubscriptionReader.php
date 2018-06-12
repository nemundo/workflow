<?php
namespace Nemundo\Workflow\App\Subscription\Data\WorkflowSubscription;
class WorkflowSubscriptionReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var WorkflowSubscriptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowSubscriptionModel();
}
/**
* @return WorkflowSubscriptionRow[]
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
* @return WorkflowSubscriptionRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return WorkflowSubscriptionRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new WorkflowSubscriptionRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}