<?php
namespace Nemundo\Workflow\App\Subscription\Data\WorkflowSubscription;
use Nemundo\Model\Form\ModelFormUpdate;
class WorkflowSubscriptionFormUpdate extends ModelFormUpdate {
/**
* @var WorkflowSubscriptionModel
*/
public $model;

protected function loadCom() {
$this->model = new WorkflowSubscriptionModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}