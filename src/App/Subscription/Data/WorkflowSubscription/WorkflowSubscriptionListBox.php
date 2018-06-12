<?php
namespace Nemundo\Workflow\App\Subscription\Data\WorkflowSubscription;
class WorkflowSubscriptionListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var WorkflowSubscriptionModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WorkflowSubscriptionModel();
$this->label = $this->model->label;
}
}