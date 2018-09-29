<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationType;
use Nemundo\Model\View\ModelView;
class NotificationTypeView extends ModelView {
/**
* @var NotificationTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new NotificationTypeModel();
}
}