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

public function __construct() {
parent::__construct();
$this->model = new UserNotificationModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->statusChangeId, $this->statusChangeId);
$id = parent::save();
return $id;
}
}