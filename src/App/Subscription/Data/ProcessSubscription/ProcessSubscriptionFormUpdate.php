<?php
namespace Nemundo\Workflow\App\Subscription\Data\ProcessSubscription;
use Nemundo\Model\Form\ModelFormUpdate;
class ProcessSubscriptionFormUpdate extends ModelFormUpdate {
/**
* @var ProcessSubscriptionModel
*/
public $model;

protected function loadCom() {
$this->model = new ProcessSubscriptionModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}