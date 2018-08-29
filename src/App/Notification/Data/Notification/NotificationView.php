<?php
namespace Nemundo\Workflow\App\Notification\Data\Notification;
use Nemundo\Model\View\ModelView;
class NotificationView extends ModelView {
/**
* @var NotificationModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new NotificationModel();
}
}