<?php
namespace Nemundo\Workflow\App\Workflow\Data\UserNotification;
use Nemundo\Model\Id\AbstractModelIdValue;
class UserNotificationId extends AbstractModelIdValue {
/**
* @var UserNotificationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserNotificationModel();
}
}