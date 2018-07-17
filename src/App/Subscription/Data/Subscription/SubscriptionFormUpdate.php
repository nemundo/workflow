<?php
namespace Nemundo\Workflow\App\Subscription\Data\Subscription;
use Nemundo\Model\Form\ModelFormUpdate;
class SubscriptionFormUpdate extends ModelFormUpdate {
/**
* @var SubscriptionModel
*/
public $model;

protected function loadCom() {
$this->model = new SubscriptionModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}