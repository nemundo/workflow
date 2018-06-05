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
public $workflowId;

/**
* @var string
*/
public $userId;

public function __construct() {
parent::__construct();
$this->model = new UserNotificationModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->workflowId, $this->workflowId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$id = parent::save();
return $id;
}
}