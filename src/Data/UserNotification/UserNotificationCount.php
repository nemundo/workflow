<?php
namespace Nemundo\Workflow\Data\UserNotification;
class UserNotificationCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var UserNotificationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserNotificationModel();
}
}