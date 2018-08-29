<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationType;
class NotificationType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var NotificationTypeModel
*/
protected $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $notificationType;

public function __construct() {
parent::__construct();
$this->model = new NotificationTypeModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->notificationType, $this->notificationType);
$id = parent::save();
return $id;
}
}