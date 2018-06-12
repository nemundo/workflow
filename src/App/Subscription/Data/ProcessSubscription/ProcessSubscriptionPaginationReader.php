<?php
namespace Nemundo\Workflow\App\Subscription\Data\ProcessSubscription;
class ProcessSubscriptionPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
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
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ProcessSubscriptionRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}