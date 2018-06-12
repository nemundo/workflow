<?php
namespace Nemundo\Workflow\App\Subscription\Data\ProcessSubscription;
class ProcessSubscriptionCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ProcessSubscriptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ProcessSubscriptionModel();
}
}