<?php
namespace Nemundo\Workflow\App\Subscription\Data\WorkflowSubscription;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class WorkflowSubscriptionTable extends BootstrapModelTable {
/**
* @var WorkflowSubscriptionModel
*/
public $model;

protected function loadCom() {
$this->model = new WorkflowSubscriptionModel();
}
}