<?php
namespace Nemundo\Workflow\Data\UserNotification;
use Nemundo\Model\Data\AbstractModelUpdate;
class UserNotificationUpdate extends AbstractModelUpdate {
/**
* @var UserNotificationModel
*/
public $model;

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
public $delete;

public function __construct() {
parent::__construct();
$this->model = new UserNotificationModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->statusChangeId, $this->statusChangeId);
$this->typeValueList->setModelValue($this->model->delete, $this->delete);
parent::update();
}
}