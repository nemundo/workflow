<?php
namespace Nemundo\Workflow\App\Notification\Data\Notification;
class NotificationAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var NotificationModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  NotificationModel();
}
}