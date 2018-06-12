<?php
namespace Nemundo\Workflow\App\Subscription\Data\WorkflowSubscription;
class WorkflowSubscriptionForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
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