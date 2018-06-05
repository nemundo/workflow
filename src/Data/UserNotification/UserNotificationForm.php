<?php
namespace Nemundo\Workflow\Data\UserNotification;
class UserNotificationForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
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