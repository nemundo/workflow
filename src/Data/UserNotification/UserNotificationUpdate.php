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

public function __construct() {
parent::__construct();
$this->model = new UserNotificationModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->statusChangeId, $this->statusChangeId);
parent::update();
}
}