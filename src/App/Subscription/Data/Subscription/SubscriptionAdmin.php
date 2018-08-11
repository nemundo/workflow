<?php
namespace Nemundo\Workflow\App\Subscription\Data\Subscription;
class SubscriptionAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var SubscriptionModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  SubscriptionModel();
}
}