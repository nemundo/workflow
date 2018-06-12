<?php
namespace Nemundo\Workflow\App\Subscription\Data\WorkflowSubscription;
class WorkflowSubscriptionPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
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
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new WorkflowSubscriptionRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}