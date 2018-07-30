<?php
namespace Nemundo\Workflow\App\Subscription\Data\Subscription;
class SubscriptionForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var SubscriptionModel
*/
public $model;

protected function loadCom() {
$this->model = new SubscriptionModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}