<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationType;
class NotificationTypeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var NotificationTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  NotificationTypeModel();
}
}