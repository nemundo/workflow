<?php
namespace Nemundo\Workflow\App\Workflow\Data\UserNotification;
use Nemundo\Model\Form\ModelFormUpdate;
class UserNotificationFormUpdate extends ModelFormUpdate {
/**
* @var UserNotificationModel
*/
public $model;

protected function loadCom() {
$this->model = new UserNotificationModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}