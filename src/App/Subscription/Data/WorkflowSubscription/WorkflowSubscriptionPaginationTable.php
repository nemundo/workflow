<?php
namespace Nemundo\Workflow\App\Subscription\Data\WorkflowSubscription;
class WorkflowSubscriptionPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var WorkflowSubscriptionModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WorkflowSubscriptionModel();
}
}