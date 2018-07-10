<?php
namespace Nemundo\Workflow\App\Workflow\Data\UserNotification;
class UserNotificationAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var UserNotificationModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  UserNotificationModel();
}
}