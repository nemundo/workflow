<?php
namespace Nemundo\Workflow\Data\UserNotification;
class UserNotification extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var UserNotificationModel
*/
protected $model;

/**
* @var string
*/
public $userId;

/**
* @var string
*/
public $statusChangeId;

/**
* @var bool
*/
public $read;

/**
* @var bool
*/
public $delete;

public function __construct() {
parent::__construct();
$this->model = new UserNotificationModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->statusChangeId, $this->statusChangeId);
$this->typeValueList->setModelValue($this->model->read, $this->read);
$this->typeValueList->setModelValue($this->model->delete, $this->delete);
$id = parent::save();
return $id;
}
}