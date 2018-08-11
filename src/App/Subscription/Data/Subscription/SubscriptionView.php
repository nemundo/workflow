<?php
namespace Nemundo\Workflow\App\Subscription\Data\Subscription;
use Nemundo\Model\View\ModelView;
class SubscriptionView extends ModelView {
/**
* @var SubscriptionModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SubscriptionModel();
}
}