<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationType;
use Nemundo\Model\Data\AbstractModelUpdate;
class NotificationTypeUpdate extends AbstractModelUpdate {
/**
* @var NotificationTypeModel
*/
public $model;

/**
* @var string
*/
public $notificationType;

public function __construct() {
parent::__construct();
$this->model = new NotificationTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->notificationType, $this->notificationType);
parent::update();
}
}