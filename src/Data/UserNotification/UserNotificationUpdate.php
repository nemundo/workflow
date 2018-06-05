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
public $workflowId;

/**
* @var string
*/
public $userId;

public function __construct() {
parent::__construct();
$this->model = new UserNotificationModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->workflowId, $this->workflowId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
parent::update();
}
}