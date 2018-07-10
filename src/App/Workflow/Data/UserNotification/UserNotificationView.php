<?php
namespace Nemundo\Workflow\App\Workflow\Data\UserNotification;
use Nemundo\Model\View\ModelView;
class UserNotificationView extends ModelView {
/**
* @var UserNotificationModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new UserNotificationModel();
}
}