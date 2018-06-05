<?php
namespace Nemundo\Workflow\Data\UserNotification;
class UserNotificationDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var UserNotificationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserNotificationModel();
}
}