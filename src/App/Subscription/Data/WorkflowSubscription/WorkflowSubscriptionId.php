<?php
namespace Nemundo\Workflow\App\Subscription\Data\WorkflowSubscription;
use Nemundo\Model\Id\AbstractModelIdValue;
class WorkflowSubscriptionId extends AbstractModelIdValue {
/**
* @var WorkflowSubscriptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowSubscriptionModel();
}
}