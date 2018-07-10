<?php
namespace Nemundo\Workflow\App\Workflow\Data\UserNotification;
class UserNotificationPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var UserNotificationModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new UserNotificationModel();
}
}