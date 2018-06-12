<?php
namespace Nemundo\Workflow\App\Subscription\Data\ProcessSubscription;
use Nemundo\Model\Id\AbstractModelIdValue;
class ProcessSubscriptionId extends AbstractModelIdValue {
/**
* @var ProcessSubscriptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ProcessSubscriptionModel();
}
}