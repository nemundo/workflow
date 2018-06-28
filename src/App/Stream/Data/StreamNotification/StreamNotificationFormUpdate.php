<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamNotification;
use Nemundo\Model\Form\ModelFormUpdate;
class StreamNotificationFormUpdate extends ModelFormUpdate {
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