<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationType;
class NotificationTypeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var NotificationTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new NotificationTypeModel();
}
}