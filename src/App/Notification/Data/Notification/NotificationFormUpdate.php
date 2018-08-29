<?php
namespace Nemundo\Workflow\App\Notification\Data\Notification;
use Nemundo\Model\Form\ModelFormUpdate;
class NotificationFormUpdate extends ModelFormUpdate {
/**
* @var NotificationModel
*/
public $model;

protected function loadCom() {
$this->model = new NotificationModel();
}
}