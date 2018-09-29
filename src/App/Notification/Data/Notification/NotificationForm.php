<?php
namespace Nemundo\Workflow\App\Notification\Data\Notification;
class NotificationForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var NotificationModel
*/
public $model;

protected function loadCom() {
$this->model = new NotificationModel();
}
}