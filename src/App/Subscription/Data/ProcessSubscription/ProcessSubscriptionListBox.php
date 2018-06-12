<?php
namespace Nemundo\Workflow\App\Subscription\Data\ProcessSubscription;
class ProcessSubscriptionListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var ProcessSubscriptionModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ProcessSubscriptionModel();
$this->label = $this->model->label;
}
}