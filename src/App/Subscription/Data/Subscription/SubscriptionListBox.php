<?php
namespace Nemundo\Workflow\App\Subscription\Data\Subscription;
class SubscriptionListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var SubscriptionModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new SubscriptionModel();
$this->label = $this->model->label;
}
}