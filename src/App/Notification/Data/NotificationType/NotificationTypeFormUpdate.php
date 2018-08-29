<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationType;
use Nemundo\Model\Form\ModelFormUpdate;
class NotificationTypeFormUpdate extends ModelFormUpdate {
/**
* @var NotificationTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new NotificationTypeModel();
}
}