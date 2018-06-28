<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamNotification;
use Nemundo\Model\View\ModelView;
class StreamNotificationView extends ModelView {
/**
* @var StreamNotificationModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new StreamNotificationModel();
}
}