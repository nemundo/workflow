<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationType;
class NotificationTypeListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var NotificationTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new NotificationTypeModel();
$this->label = $this->model->label;
}
}