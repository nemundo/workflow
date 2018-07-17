<?php
namespace Nemundo\Workflow\App\Subscription\Data\Subscription;
class SubscriptionPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var SubscriptionModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SubscriptionModel();
}
}