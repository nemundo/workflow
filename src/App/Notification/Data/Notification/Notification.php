<?php
namespace Nemundo\Workflow\App\Notification\Data\Notification;
class Notification extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var NotificationModel
*/
protected $model;

/**
* @var string
*/
public $dataId;

/**
* @var string
*/
public $userId;

/**
* @var string
*/
public $notificationTypeId;

public function __construct() {
parent::__construct();
$this->model = new NotificationModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->notificationTypeId, $this->notificationTypeId);
$id = parent::save();
return $id;
}
}