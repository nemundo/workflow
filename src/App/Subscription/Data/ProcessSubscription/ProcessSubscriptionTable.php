<?php
namespace Nemundo\Workflow\App\Subscription\Data\ProcessSubscription;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class ProcessSubscriptionTable extends BootstrapModelTable {
/**
* @var ProcessSubscriptionModel
*/
public $model;

protected function loadCom() {
$this->model = new ProcessSubscriptionModel();
}
}