<?php
namespace Nemundo\Workflow\App\Subscription\Data\WorkflowSubscription;
class WorkflowSubscriptionCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var WorkflowSubscriptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowSubscriptionModel();
}
}