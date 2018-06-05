<?php
namespace Nemundo\Workflow\Data\UserNotification;
class UserNotificationValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var UserNotificationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserNotificationModel();
}
}