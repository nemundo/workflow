<?php
namespace Nemundo\Workflow\Data\UserNotification;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class UserNotificationTable extends BootstrapModelTable {
/**
* @var UserNotificationModel
*/
public $model;

protected function loadCom() {
$this->model = new UserNotificationModel();
}
}