<?php
namespace Nemundo\Workflow\App\Subscription\Data\Subscription;
class SubscriptionListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var SubscriptionModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SubscriptionModel();
$this->label = $this->model->label;
}
}