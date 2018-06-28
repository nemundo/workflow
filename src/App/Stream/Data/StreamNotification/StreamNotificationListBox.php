<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamNotification;
class StreamNotificationListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var StreamNotificationModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new StreamNotificationModel();
$this->label = $this->model->label;
}
}