<?php
namespace Nemundo\Workflow\App\Subscription\Data\WorkflowSubscription;
use Nemundo\Model\View\ModelView;
class WorkflowSubscriptionView extends ModelView {
/**
* @var WorkflowSubscriptionModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WorkflowSubscriptionModel();
}
}