<?php
namespace Nemundo\Workflow\App\Subscription\Data\ProcessSubscription;
class ProcessSubscriptionValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ProcessSubscriptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ProcessSubscriptionModel();
}
}