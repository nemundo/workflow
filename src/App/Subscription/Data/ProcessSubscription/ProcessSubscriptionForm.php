<?php
namespace Nemundo\Workflow\App\Subscription\Data\ProcessSubscription;
class ProcessSubscriptionForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var ProcessSubscriptionModel
*/
public $model;

protected function loadCom() {
$this->model = new ProcessSubscriptionModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}