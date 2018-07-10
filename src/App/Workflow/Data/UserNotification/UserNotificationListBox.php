<?php
namespace Nemundo\Workflow\App\Workflow\Data\UserNotification;
class UserNotificationListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var UserNotificationModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new UserNotificationModel();
$this->label = $this->model->label;
}
}