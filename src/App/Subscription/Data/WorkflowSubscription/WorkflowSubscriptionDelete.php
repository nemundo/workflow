<?php
namespace Nemundo\Workflow\App\Subscription\Data\WorkflowSubscription;
class WorkflowSubscriptionDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var WorkflowSubscriptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowSubscriptionModel();
}
}