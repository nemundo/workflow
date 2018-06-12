<?php
namespace Nemundo\Workflow\App\Subscription\Data\ProcessSubscription;
class ProcessSubscriptionPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var ProcessSubscriptionModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ProcessSubscriptionModel();
}
}