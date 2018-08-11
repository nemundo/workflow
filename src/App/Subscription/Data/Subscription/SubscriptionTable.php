<?php
namespace Nemundo\Workflow\App\Subscription\Data\Subscription;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class SubscriptionTable extends BootstrapModelTable {
/**
* @var SubscriptionModel
*/
public $model;

protected function loadCom() {
$this->model = new SubscriptionModel();
}
}