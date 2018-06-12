<?php
namespace Nemundo\Workflow\App\Subscription\Data\WorkflowSubscription;
class WorkflowSubscriptionValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var WorkflowSubscriptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowSubscriptionModel();
}
}