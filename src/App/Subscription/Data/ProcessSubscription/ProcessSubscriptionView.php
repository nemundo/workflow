<?php
namespace Nemundo\Workflow\App\Subscription\Data\ProcessSubscription;
use Nemundo\Model\View\ModelView;
class ProcessSubscriptionView extends ModelView {
/**
* @var ProcessSubscriptionModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ProcessSubscriptionModel();
}
}