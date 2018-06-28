<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamNotification;
class StreamNotificationForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var StreamNotificationModel
*/
public $model;

protected function loadCom() {
$this->model = new StreamNotificationModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}